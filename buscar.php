<?php 
require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($basedatos_config);
if(!$conexion){
   header('Location: error.php');   
}

if($_SERVER['REQUEST_METHOD']== 'GET' && !empty($_GET['busqueda'])){
    $busqueda = limpiarDatos($_GET['busqueda']);
    $statement = ($conexion->prepare(
        'SELECT * FROM libros WHERE titulo LIKE :busqueda or resena LIKE :busqueda'
    ));
    $statement->execute(array(':busqueda'=>"%$busqueda%"));
    $resultados = $statement->fetchAll();

    if(empty($resultados)){
        $titulo = "No se encontraron articulos con el resultado '" . $busqueda."' ";;
    }else{
        $titulo = "Resultados de la busqueda: '" . $busqueda." '";
    }
}else{
    header('Location:'. RUTA . '/index.php');
}
require 'view/buscar.view.php';
?>