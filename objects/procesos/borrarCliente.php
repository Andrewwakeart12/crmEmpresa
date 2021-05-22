<?php

require_once ('../../functions.php');
require '../../admin/config.php';

require '../../objects/Cliente.php';
require '../../objects/DAOClient.php';
$conexion=conexion($bd_config);

$DAOCliente= new DAOClient();
$clienteAElminar=$_POST['idCliente'];
$clienteAElminarObj= new Cliente($clienteAElminar);
$DAOCliente->eliminar($clienteAElminarObj,$conexion);
header("Location: ../../admin/index.php");
    die();
?>