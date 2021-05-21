<?php

require_once ('../../functions.php');
require '../../admin/config.php';

require '../../objects/Maquina.php';
require '../../objects/DAOMaquina.php';
$conexion=conexion($bd_config);

$DAOMaquina= new DAOMaquina();
$MaquinaAElminar=$_POST['maquinaId'];
$MaquinaAElminarObj= new Maquina($MaquinaAElminar);
$DAOMaquina->eliminar($MaquinaAElminarObj,$conexion);
header("Location: ../../index.php");
die();