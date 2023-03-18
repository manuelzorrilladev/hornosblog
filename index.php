<?php

require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
if(!$conexion){
    header('Location: error.php');
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

contadorIndex($conexion);


if(!$posts){
    header ('Location: error.php');
}


require 'view/index.view.php';

?>