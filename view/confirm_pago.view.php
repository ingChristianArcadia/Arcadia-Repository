<?PHP require 'view/header.php' ;?>
<div class="container">
    <div class="status">
        <?php if(!empty($payment_id)){ ?>
            <h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
			
            <h4>Informacion del Pago</h4>
            <p><b>Numero de Referencia:</b> <?php echo $payment_id; ?></p>
            <p><b>Codigo de Transaccion:</b> <?php echo $transactionID; ?></p>
            <p><b>Usted Pago:</b> <?php echo $paidAmount.' '.$paidCurrency; ?></p>
            <p><b>Estatus del Pago:</b> <?php echo $payment_status; ?></p>
			
            <h4>Informacion del producto</h4>
            <p><b>Libro:</b> <?php echo $titulo_libro; ?></p>
            <p><b>Precio:</b> <?php echo $precio_libro.' '.$currency; ?></p>
        <?php }else{ ?>
            <h1 class="error">Su pago ha fallado!</h1>
        <?php } ?>
    </div>
    <a href="index.php" class="btn-link">Ir a inicio</a>
</div>
<?PHP require 'view/footer.php' ;?>