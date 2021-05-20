<?php session_start();
 require 'config.php';
 require '../functions.php';
 
 $conexion=conexion($bd_config);
    comprobar_sesion();
 if(!$conexion){
     header('Location:error.php');
 }else{
   $posts= obtener_post($blog_config['post_por_pagina'],$conexion);}
   
if(!$posts){
    header('Location:../error.php');
} 

?>

<?php require '../views/partials/header.php'?>


<?php
require '../views/partials/pagination.php'?>
<?php require '../views/partials/footer.php'?>