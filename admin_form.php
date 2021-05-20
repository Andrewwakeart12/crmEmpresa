<?php
require 'admin/config.php';
require 'functions.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $usuario=limpiarDatos($_POST['usuario']);

    $password=limpiarDatos($_POST['password']);
if($usuario== $blog_admin['usuario'] && $password== $blog_admin['password']){
    session_start();
        $_SESSION['admin']=true;
    header('Location:'.RUTA .'admin');
}
}
require 'views/admin_form.view.php';

?>