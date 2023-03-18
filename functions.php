<?php 

function conexion($bd_config){
    try{
        $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
        return $conexion;
    } catch (PDOException $e){
        return false;
    }   
}

function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}
function pagina_actual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}



function obtener_post($post_por_pagina, $conexion){
    $inicio = (pagina_actual() >1)? pagina_actual() * $post_por_pagina - $post_por_pagina : 0; 
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_por_pagina"); 
    $sentencia->execute();
    $publicaciones = array_reverse($sentencia->fetchAll());          
    return $publicaciones;
}

function numero_paginas($post_por_pagina, $conexion){
    $total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
    $total_post->execute();
    $total_post = $total_post->fetch()['total'];

    $numero_paginas = ceil($total_post / $post_por_pagina);
    return $numero_paginas;


}


function id_articulo($id){
    return (int)limpiarDatos($id);
}
 function obtener_post_por_id($conexion, $id){
     $resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
     $resultado = $resultado->fetchAll();
     return ($resultado)? $resultado : false;
 }

 function fecha($fecha){
     $timestamp = strtotime($fecha);
     $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

     $dia = date('d', $timestamp);
     $mes = date('m', $timestamp) - 1;
     $year = date('Y', $timestamp);
     $fecha = "$dia de " . $meses[$mes] . " del $year";
     return $fecha; 
    
}


function comprobarSession(){
    if (!isset($_SESSION['admin'])){
        header('Location: ' . RUTA);
    }
}


function traerContador($id, $conexion){
    $resultado = $conexion->query("SELECT conta FROM articulos WHERE id = $id");
    $resultado = $resultado->fetchAll();
    $conta = $resultado[0][0];

    return $conta;
}

function contador($id, $conexion){

    $resultado = $conexion->query("SELECT conta FROM articulos WHERE id = $id");
    $resultado = $resultado->fetchAll();


    $conta = $resultado[0][0]+ 1;

    $resultado = $conexion->query("UPDATE articulos SET conta = $conta WHERE  id= $id");
    $resultado = $resultado->fetchAll();
   
    return $resultado;

}


function contadorIndex( $conexion){
    $resultado = $conexion->query("SELECT conta FROM visitas WHERE id = 1");
    $resultado = $resultado->fetchAll();

    $conta2 = $resultado[0][0] + 1;

  /*   print_r($conta2); */
    
    $resultado = $conexion->query("UPDATE visitas SET conta = $conta2 WHERE id = 1");
    $resultado = $resultado->fetchAll();
   
    return $resultado;


}

function traerContadorIndex($conexion){
    $resultado = $conexion->query("SELECT conta FROM visitas WHERE id = 1");
    $resultado = $resultado->fetchAll();

    $conta2 = $resultado[0][0];

    return $conta2;
}



?>