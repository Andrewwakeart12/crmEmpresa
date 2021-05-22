<?php
require_once ('../../functions.php');
require '../../admin/config.php';

require '../../objects/Cliente.php';
require '../../objects/DAOClient.php';

require '../../objects/Maquina.php';
require '../../objects/DAOMaquina.php';
$conexion=conexion($bd_config);
$nuevaMaquinaIdDueño= limpiarDatos($_POST['clientesDisponibles']);
$nuevaMaquinaCalcomania= limpiarDatos($_POST['calcomania']);
$nuevaMaquinaEquipo= limpiarDatos($_POST['equipo']);
$nuevaMaquinaMarca= limpiarDatos($_POST['marca']);
$nuevaMaquinaModelo= limpiarDatos($_POST['modelo']);
$nuevaMaquinaStatus= limpiarDatos($_POST['status']);
$nuevaMaquinaUltimoServicio= limpiarDatos($_POST['ultimoServicio']);
$nuevaMaquinaProximoServicio= limpiarDatos($_POST['proximoServicio']);
$nuevaMaquina=new Maquina($nuevaMaquinaIdDueño,$nuevaMaquinaCalcomania,$nuevaMaquinaEquipo,$nuevaMaquinaMarca,$nuevaMaquinaModelo,$nuevaMaquinaStatus,$nuevaMaquinaUltimoServicio,$nuevaMaquinaProximoServicio);

$DAOMaquina= new DAOMaquina();
$DAOMaquina->insertar($nuevaMaquina,$conexion);
header("Location: ../../admin/index.php");
    die();


?>