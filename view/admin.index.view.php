<?php require '../view/header.php';?>
<div class="contenedor">
    <h2>Panel de control</h2>
    <a href="nuevo.php" class="gbutton">Nuevo libro</a>
    <a href="cerrar.php" class="gbutton" type="button">Cerrar Sesion</a>
   
    <?php foreach($posts as $post): ?>
        <div class="post">
            <article>
                <h2 class="titulo"><?php echo $post['titulo'];?></h2>
                <a href="editar.php?id=<?php echo $post['id'] ;?>" class="btn btn-secondary" type="button">Editar</a>
                <a href="../libro.php?id=<?php echo $post['id'];?>" class="btn btn-success" type="button">Ver</a>
                <a href="borrar.php?id=<?php echo $post['id'];?>" class="btn btn-danger" type="button">Borrar</a>
            </article>
        </div>
    <?php endforeach;?>
    <?php require '../paginacion.php';?>
</div>
<?php require '../view/footer.php';?>