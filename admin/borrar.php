<?php
    session_start();
    require 'config.php';
    require '../funciones.php';
    comprobarSession();


    $conexion = conexion($bd_config);

    if(!$conexion){
        echo ('error de conexion');
        header('Location: ../error.php');
       
    }

    $id = limpiarDatos($_GET['id']);

    if(!$id){       
        header('Location: '. RUTA . '/admin');
    }

    $statement = $conexion->prepare("DELETE FROM libros WHERE id = :id");

    $statement -> execute(array(
        'id'=>$id
    ));
    
    header('Location:' . RUTA . '/admin');

?>