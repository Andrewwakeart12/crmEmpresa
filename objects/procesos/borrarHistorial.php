<?php

require_once ('../../functions.php');
require '../../admin/config.php';

require '../../objects/Historial.php';
require '../../objects/DAOHistorial.php';
$conexion=conexion($bd_config);

$DAOHistorial= new DAOHistorial();
$HistorialAElminar=$_POST['idHistorial'];
$HistorialAElminarObj= new Historial($HistorialAElminar,$HistorialAElminar);
$DAOHistorial->eliminar($HistorialAElminarObj,$conexion);
header("Location: ../../index.php");
    die();
?>