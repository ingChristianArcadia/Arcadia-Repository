<?php
    session_start();
    require 'config.php';
    require '../funciones.php';
    comprobarSession();

    $conexion = conexion();

    if(!$conexion){
        header('Location: ../error.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titulo = limpiarDatos($_POST['titulo']);
        $resena = $_POST['resena'];
        $precio = $_POST['precio'];            
        $imagen = $_FILES['imagen']['tmp_name'];       
        
        $archivo_subido = '../'.$ecommerce_config['carpeta_imagenes'].$_FILES['imagen']['name'];
        move_uploaded_file($imagen,$archivo_subido);
        $imagen = $_FILES['imagen']['name'];
        
        $statement = $conexion->prepare(
            "INSERT INTO libros (id,titulo,resena,precio,imagen)
            VALUES (null,:titulo,:resena,:precio,:imagen)"
            );
        
        $statement->execute(array(
            'titulo' => $titulo,
            'resena' => $resena,
            'precio' => $precio,
            'imagen' => $imagen,
               
        ));        
        
        header('Location: '. RUTA . '/admin');
    }
    
    require '../view/nuevo.view.php';
?>