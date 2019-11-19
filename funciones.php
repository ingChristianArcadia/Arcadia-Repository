<?php
require 'admin/config.php';

function conexion(){
    try{
        $conexion = new PDO("mysql:host=localhost;dbname=ecommerce_arcadia;charset-utf8mb4",'root','root');
        return $conexion;
    }catch(PDOException $e){       
        return false;
    }
}

function pagina_actual(){
    return (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
}

function obtener_post($post_por_pagina,$conexion){
    $inicio = (pagina_actual()>1) ? pagina_actual() * $post_por_pagina - $post_por_pagina: 0;
    $sentencia = $conexion ->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM libros LIMIT $inicio,$post_por_pagina");
    $sentencia ->execute();
    return $sentencia->fetchAll();
}

function numero_paginas($post_por_pagina,$conexion){
    $total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
    $total_post -> execute();
    $total_post = $total_post->fetch()['total'];

    $numero_paginas = ceil($total_post/$post_por_pagina);
    return $numero_paginas;
}

function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripcslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function id_libro($id){
    return (int)limpiarDatos($id);
}


function obtener_post_por_id($conexion,$id){
    $resultado = $conexion->query("SELECT * FROM libros WHERE id = $id LIMIT 1");
    $resultado = $resultado->fetchAll();
    return ($resultado) ? $resultado : false;
}


function comprobarSession(){
    if(!isset($_SESSION['admin'])){
        header('Location: '.RUTA);
        die();       
    }
}



?>
