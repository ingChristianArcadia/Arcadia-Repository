<?php

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion();//La conexion viene desde config.php

if(!$conexion){
    
    header('Location:error.php');
}

$posts = obtener_post($ecommerce_config['post_por_pagina'],$conexion);

if(!$posts){
    header ('Location: error.php');
    echo 'error: sin posts';
}








require 'view/index.view.php';
?>