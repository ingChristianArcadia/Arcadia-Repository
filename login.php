<?php
session_start();
require 'admin/config.php';
require 'funciones.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);

    if($usuario == $blog_admin['SA'] && $password == $blog_admin['password']){
        $_SESSION['admin'] = $blog_admin['SA'];
        header('Location: ' . RUTA . '/admin');
    }else{
        echo 'Usuario o contraseña incorrectos';
    }
}

require 'view/login.view.php';
?>