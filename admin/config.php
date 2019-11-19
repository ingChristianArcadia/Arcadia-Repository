<?php 
// Stripe API configuration  
define('STRIPE_API_KEY', 'sk_test_FvV1lKSo64ZVYX2If2frrduj008PfnCF7m'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_lgnWSawVod6kUnfkZjGwJntq00vAlxTgRL'); 
$currency = "MXN";

define ('RUTA','http://localhost/practicas_arcadia/ecommerce');

$ecommerce_config = array(
    'post_por_pagina' => '3',
    'carpeta_imagenes' => 'imagenes/'
);

$blog_admin = array(
    'SA' => 'Christian',
    'password'=>'123'
);

?>