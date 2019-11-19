<?PHP require 'view/header.php' ;?>
<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v2/"></script>
<!-- jQuery is used only for this example; it isn't required to use Stripe -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <table>
        <td>
            <tr>
                <h1>Articulo</h1>
            </tr>
            <tr>
                <h6 class="titulo">Libro: <a><?php echo $post['titulo'];?></a></h6>
            </tr>
                                        
            <tr>
                <h6 class="titulo">Precio: <a><?php echo $post['precio'];?></a></h6>                     
            </tr> 

        </td>
        <td>                      
            <!-- Payment form -->
            <form action="confirm_pago.php" method="POST" id="paymentFrm">
                    <input type="hidden" value="<?php echo $post['id'];?>" name="id">
                    <input type="hidden" value="<?php echo $post['titulo'];?>" name="titulo">
                    <input type="hidden" value="<?php echo $post['precio'];?>" name="precio">             
                    <label>NOMBRE</label>
                    <input type="text" name="name" id="name" placeholder="Escribir nombre" required="" autofocus="">
               
                    <label>CORREO</label>
                    <input type="email" name="email" id="email" placeholder="Escribir correo" required="">
              
                    <label>NUMERO DE LA TARJETA</label>
                    <input type="text" name="card_number" id="card_number" placeholder="4242 4242 4242 4242" autocomplete="off" required="">
                    <br />
                    <label>FECHA DE EXPIRACION</label>                          
                    <input type="text" name="card_exp_month" id="card_exp_month" placeholder="MM" required="">
                            
                    <input type="text" name="card_exp_year" id="card_exp_year" placeholder="YYYY" required="">
                  
                    <label>CODIGO CVC</label>
                    <input type="text" name="card_cvc" id="card_cvc" placeholder="CVC" autocomplete="off" required="">
                       
                <button type="submit" class="btn btn-success" id="payBtn">Pagar</button>
                <div class="payment-status"></div>             
        </td>                                       
    </table>
<script>
    // Set your publishable key
Stripe.setPublishableKey('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

// Callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        // Enable the submit button
        $('#payBtn').removeAttr("disabled");
        // Display the errors on the form
        $(".payment-status").html('<p>'+response.error.message+'</p>');
    } else {
        var form$ = $("#paymentFrm");
        // Get token id
        var token = response.id;
        // Insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        // Submit form to the server
        form$.get(0).submit();
    }
}

$(document).ready(function() {
    // On form submit
    $("#paymentFrm").submit(function() {
        // Disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
		
        // Create single-use token to charge the user
        Stripe.createToken({
            number: $('#card_number').val(),
            exp_month: $('#card_exp_month').val(),
            exp_year: $('#card_exp_year').val(),
            cvc: $('#card_cvc').val()
        }, stripeResponseHandler);
		
        // Submit from callback
        return false;
    });
});
</script>
<?PHP require 'view/footer.php' ;?>