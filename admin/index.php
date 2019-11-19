<?php
//Archivo index de Administrador
session_start();
require 'config.php';
require '../funciones.php';

$conexion = conexion();
comprobarSession();
if(!$conexion){
    header('Location:../error.php');
}
$posts = obtener_post($ecommerce_config['post_por_pagina'],$conexion);


require '../view/admin.index.view.php';
?>