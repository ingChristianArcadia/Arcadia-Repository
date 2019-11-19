<?php 
// Include configuration file  
require 'admin/config.php';
require 'funciones.php';

$conexion = conexion();//La conexion viene desde config.php

if(!$conexion){
    
    header('Location:error.php');
}
$payment_id = $statusMsg = ''; 
$ordStatus = 'error'; 
 
// Check whether stripe token is not empty 
if(!empty($_POST['stripeToken'])){ 
    
    // Retrieve stripe token, card and user info from the submitted form data 
    $token  = $_POST['stripeToken']; 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $card_number = $_POST['card_number']; 
    $card_exp_month = $_POST['card_exp_month']; 
    $card_exp_year = $_POST['card_exp_year']; 
    $card_cvc = $_POST['card_cvc'];
    $id_libro = $_POST['id'];
    $titulo_libro = $_POST['titulo'];
    $precio_libro = $_POST['precio']; 
    
    // Include Stripe PHP library 
    require_once 'stripe-php/init.php'; 
     
    // Set API key 
    \Stripe\Stripe::setApiKey(STRIPE_API_KEY); 
    
    // Add customer to stripe 
    $customer = \Stripe\Customer::create(array( 
        'email' => $email, 
        'source'  => $token 
    )); 
   
    // Unique order ID 
    $orderID = strtoupper(str_replace('.','',uniqid('', true))); 
     
    // Convert price to cents 
    $precio_libro = ($precio_libro*100); 
    
    // Charge a credit or a debit card 
    $charge = \Stripe\Charge::create(array( 
        'customer' => $customer->id, 
        'amount'   => $precio_libro, 
        'currency' => $currency, 
        'description' => $titulo_libro, 
        'metadata' => array( 
            'order_id' => $orderID 
        ) 
    )); 
    
    // Retrieve charge details 
    $chargeJson = $charge->jsonSerialize(); 
 
    // Check whether the charge is successful 
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 
        // Order details  
        
        $transactionID = $chargeJson['balance_transaction']; 
        $paidAmount = $chargeJson['amount']; 
        $paidCurrency = $chargeJson['currency']; 
        $payment_status = $chargeJson['status']; 
         
        $paidAmount =  $paidAmount/100;
        $precio_libro = $precio_libro/100;
        // Include database connection file  
        include_once 'dbConnect.php'; 
       
        // Insert tansaction data into the database
        try{         
        $statement = $conexion->prepare(
            "INSERT INTO orders (name_order,email,card_number,card_exp_month,card_exp_year,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status)
             VALUES(:name2,:email,:card_number,:card_exp_month,:card_exp_year,:titulo_libro,:id_libro,:precio_libro,:currency,:paidAmount,:paidCurrency,:transactionID,:payment_status)"
             );            
                
                $statement->execute(array(
                    'name2' => $name,
                    'email'=> $email,
                    'card_number'=> $card_number,
                    'card_exp_month' => $card_exp_month,
                    'card_exp_year' => $card_exp_year,
                    'titulo_libro' => $titulo_libro,
                    'id_libro' => $id_libro,
                    'precio_libro' => $precio_libro,
                    'currency' => $currency,
                    'paidAmount' => $paidAmount,
                    'paidCurrency' => $paidCurrency,
                    'transactionID' => $transactionID,
                    'payment_status' => $payment_status
                ));
                $payment_id = $conexion->lastInsertId();
            }catch(PDOException $e){
                $statusMsg = 'Error: '+$e;
            }     

        // If the order is successful         
        if($payment_status == 'succeeded'){ 
            $ordStatus = 'success'; 
            $statusMsg = 'El pago se realizo con exito!'; 
        }else{ 
            $statusMsg = "Su pago ha fallado!"; 
        } 
    }else{ 
        //print '<pre>';print_r($chargeJson); 
        $statusMsg = "Transaccion fallida!"; 
    } 
}else{ 
    $statusMsg = "Error al enviar el formulario."; 
}
require 'view/confirm_pago.view.php';
?>

