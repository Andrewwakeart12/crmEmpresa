<?php
 
require 'admin/config.php';
require 'functions.php';
$conexion=conexion($bd_config);
if(isset($_GET['id'])){
    $articulo = obtener_post_individual(1,$conexion);
}else{
    header('location:index.php');
}

 require 'views/articulo.view.php';
?>