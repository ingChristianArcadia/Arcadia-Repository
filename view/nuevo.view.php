<?php require 'header.php';?>
<div class="post">
    <article>
        <h2 class="titulo">Nuevo Libro</h2>
            <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="formulario">
                <table>
                    <td>                  
                        <input type="hidden" value="<?php echo $post['id'];?>" name="id">
                        <tr>
                            <input  type="text" name="titulo" value="<?php echo $post['titulo'];?>" placeholder="Titulo del libro">  
                        </tr>                        
                        <tr>
                        <textarea name="resena" placeholder="Reseña del libro"><?php echo $post['resena'];?></textarea>
                        </tr>
                        <tr>
                            <table>
                                <tr>
                                    <input type="text" name="precio" value="<?php echo $post['precio'];?>" placeholder="Precio">
                                </tr>
                                <tr>
                                <input type="file" name="imagen">
                                <input type="hidden" name="imagen-guardada" value="<?php echo $post['imagen'];?>">
                                </tr>   
                            </table>
                        </tr>                       
                        <tr>
                        <input type="hidden" name="imagen-guardada" value="<?php echo $post['imagen'];?>">
                        <input type="submit" value="Nuevo Libro">
                        </tr>                       
                        
                    </td>
                </table>
            </form>
    </article>
     
<?php require 'footer.php'?>