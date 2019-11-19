<?PHP require 'view/header.php' ;?>
<div class="contenedor">      
        <div class="post">
            <article>
                <table>
                    <tr>
                        <td>
                            <div>                        
                                <img src="imagenes/<?php echo $post['imagen'];?>">                       
                            </div>            
                        </td>
                        <td id="tdderecha">
                            <table>
                                <tr>
                                    <h6 class="titulo">Titulo: <?php echo $post['titulo'];?><a href="#"></a></h6>
                                </tr>
                                <tr>
                                    <p class="resena">Reseña: <?php echo nl2br($post['resena']);?></p>                            
                                </tr>
                                <tr>
                                    <h4 class="resena">Precio: <a><?php echo $post['precio'];?></a></h4>                     
                                </tr>
                                <tr>
                                <a href="pago.php?id=<?php  echo $post['id'];?>" class="btn btn-secondary" type="button">Comprar</a>                   
                                </tr>
                            </table>
                        </td>                
                    </tr>
                </table>                 
            </article>
        </div>        
</div>
<?PHP require 'view/footer.php' ;?>