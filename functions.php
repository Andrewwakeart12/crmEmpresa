<?php
function conexion($bd_config){
    try {
       $conexion= new PDO("mysql:host=localhost;dbname=" . $bd_config['basededatos'] ,"" . $bd_config['usuario'] . "","" . $bd_config['pass'] . "");
        return $conexion;
    } catch (PDOExeption $e) {
        echo $e;
       return false;
    }
    
    
}
function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos= htmlspecialchars($datos);
    return $datos;
}
function obtener_clientes($conexion){
    $sentencia = $conexion->prepare("SELECT * FROM clientes");
    $sentencia->execute();
    return $sentencia->fetchAll();
}
function obtener_maquinas($clientId,$conexion){
    $sentencia = $conexion->prepare("SELECT * FROM maquina WHERE idCliente = :clientId");
    $sentencia -> bindParam(':clientId', $clientId);
    $sentencia->execute();
    return $sentencia->fetchAll();

}
function obtener_post_individual($id,$conexion){
    $sentencia=$conexion->prepare("SELECT*FROM articulos WHERE id=$id");
    $sentencia->execute();
    return $sentencia->fetch();
}
function numero_pagina($post_por_pagina,$conexion){
    $total_post= $conexion->prepare("SELECT FOUND_ROWS() as total");
    $total_post->execute();
    $total_post= $total_post->fetch()['total'];

    $numero_paginas= ceil($total_post / $post_por_pagina);
    return $numero_paginas;
}
function comprobar_sesion(){
    if(!isset($_SESSION['admin'])){
        header('location: ' . RUTA);
    }
}
?>