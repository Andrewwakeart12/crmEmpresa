<?php
require '../../functions.php';
require '../../admin/config.php';

require '../../objects/Historial.php';
require '../../objects/DAOHistorial.php';
$conexion=conexion($bd_config);
$DAOHistorial= new DAOHistorial();
$idMaquina=$_POST['maquinasDisponibles'];
$fecha =$_POST['fecha'];
$titulo= $_POST['titulo'];
$descripcion=$_POST['descripcion'];
$nuevoHistorial = new Historial($idMaquina,$fecha,$titulo,$descripcion);
$DAOHistorial->insertar($nuevoHistorial,$conexion);
header("Location: ../../admin/index.php");
    die();
?>