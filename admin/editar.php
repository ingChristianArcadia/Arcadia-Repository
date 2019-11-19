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
        $id = limpiarDatos($_POST['id']);
        $imagen_guardada = $_POST['imagen-guardada'];
        $imagen = $_FILES['imagen'];
        
        if(empty($imagen['name'])){
            $imagen = $imagen_guardada;
        }else{
            $archivo_subido = '../'.$ecommerce_config['carpeta_imagenes'].$_FILES['imagen']['name'];
            move_uploaded_file($_FILES['imagen']['tmp_name'],$archivo_subido);
            $imagen = $_FILES['imagen']['name'];
        }      
        
        $statement = $conexion->prepare("UPDATE libros 
            SET titulo = :titulo, 
            resena = :resena,  
            precio = :precio, 
            imagen = :imagen  
            WHERE id = :id");
        
        $statement->execute(array(
            'titulo' => $titulo,
            'resena' => $resena,
            'precio' => $precio,
            'imagen' => $imagen,
            'id'     => $id     
        ));        
        
        header('Location: '. RUTA . '/admin');
    }
    else{
            $id_libro = id_libro($_GET['id']);

            if(empty($id_libro)){                
                header ('Location:'.RUTA.'/admin');
        }

        $post = obtener_post_por_id($conexion,$id_libro);
        if(!$post){           
            header ('Location:'.RUTA.'/admin');
        }
        $post = $post[0];
    }
    require '../view/editar.view.php';
?>