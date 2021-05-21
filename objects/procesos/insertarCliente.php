<?php 

require '../../functions.php';
require '../../admin/config.php';

require '../../objects/Cliente.php';
require '../../objects/DAOClient.php';
$conexion=conexion($bd_config);
$nombre=limpiarDatos($_POST['nombre']);
$usuario=limpiarDatos($_POST['usuario']);
$contraseña=limpiarDatos($_POST['contraseña']);
$DAOCliente= new DAOClient();
$nuevoCliente= new Cliente($nombre,$usuario,$contraseña);

$DAOCliente->insertar($nuevoCliente,$conexion);
header("Location: ../../index.php");
    die();
    

?>