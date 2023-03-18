<?php
// Este archivo muestra la vista de los articulos
require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
$id_articulo = id_articulo($_GET['id']);

if(!$conexion) {
    header('Location: error.php');
}


if(empty($id_articulo)){
    header('Location: index.php');
}

$post = obtener_post_por_id($conexion, $id_articulo);




if(!$post){
    header('Location: index.php');
}

$post = $post['0'];


if(!isset($_SESSION['admin'])){

    $conta = traerContador($id_articulo, $conexion);    
    contador($id_articulo, $conexion);

} 



require 'view/single.view.php';



?>