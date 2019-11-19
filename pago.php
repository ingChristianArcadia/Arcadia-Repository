<?php
require 'admin/config.php';
require 'funciones.php';

$conexion = conexion();
$id_libro = id_libro($_GET['id']);

if(!conexion){
    header('Location: error.php');
    echo 'Error en la conexion en libro.php';
}

if(empty($id_libro)){
    header('Location:index.php');
}
$post = obtener_post_por_id($conexion,$id_libro);

if(!$post){
    header('Location:idex.php');
}

$post = $post[0];


require 'view/pago.view.php';
?>