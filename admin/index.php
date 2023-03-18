<?php session_start();
/* INDEX DEL ADMIN */
require 'config.php';
require '../functions.php';


$conexion = conexion($bd_config);


comprobarSession();


if(!$conexion){
    header('Location: ../error.php');
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

$conta2 = traerContadorIndex($conexion);





require '../view/admin_index.view.php';


?>