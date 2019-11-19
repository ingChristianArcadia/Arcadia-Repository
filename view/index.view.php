<?php require 'view/header.php' ;?>
<div class="contenedor">   
    <?php foreach($posts as $post):?>
        <div class="post">
            <article>                
                <table>
                    <tr>
                        <td>
                            <div>
                                <a href="libro.php?id=<?php echo $post['id'];?>"></a>                        
                                <img src="imagenes/<?php echo $post['imagen'];?>">                       
                            </div>            
                        </td>
                        <td id="tdderecha">
                            <table>
                                <tr>
                                    <h6 class="titulo"><a href="libro.php?id=<?php echo $post['id'];?>">Titulo: <?php echo $post['titulo'];?></a></h6>
                                </tr>
                                <tr>
                                    <p class="resena">Reseña: <?php echo nl2br($post['resena']);?></p>                            
                                </tr>
                                <tr>
                                    <h4 class="resena">Precio: <a href="libro.php?id=<?php echo $post['id'];?>"><?php echo $post['precio'];?></a></h4>                     
                                </tr>
                            </table>
                        </td>                
                    </tr>
                </table>                 
            </article>
        </div>    
    <?php endforeach;?>  
    <?php
        require 'paginacion.php'
    ?>    
</div>


<?php require 'view/footer.php' ;?>
    