<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo RUTA;?>/css/estilos.css">
    <title>Ecommerce</title>
</head>
<body>
    <header>
        <div class='contenedor'>
            <div class="izquierda">
            <p><a href="<?php echo RUTA;?>"><img src="<?php echo RUTA;?>/imagenes/logo.png" width="200" height="100"></a></p>
            </div>
            <div class="derecha">      
                    <form name="busqueda" class="buscar" action="<?php echo RUTA;?>/buscar.php" method="get">
                        <input type="text" name="busqueda" placeholder="Buscar">
                        <button type="submit" class="icono fa fa-search"></button>
                    </form> 
                    <nav class="menu">
                        <ul>
                            <li>
                                <a href="https://twitter.com/">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-envelope"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>

            </div>           
        </div>       
    </header>