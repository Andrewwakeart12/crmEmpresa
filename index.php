<?php 
session_start();
if(isset($_SESSION['idCliente'])){
    echo 'pagina del cliente';
}else{
    header("Location: clienteLogin.php");
    die();
}
?>