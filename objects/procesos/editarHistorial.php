<?php

require '../../functions.php';
require '../../admin/config.php';

require '../../objects/Historial.php';
require '../../objects/DAOHistorial.php';
$conexion=conexion($bd_config);

$DAOHistorial= new DAOHistorial();
if(isset($_POST['fecha']))
 
{   $idMaquina=limpiarDatos($_POST['maquinasDisponibles']);
    $idHistorial=limpiarDatos($_POST['maquinasDisponibles']);
    $fecha=limpiarDatos($_POST['fecha']);
    $titulo=limpiarDatos($_POST['titulo']);
    $descripcion=limpiarDatos($_POST['descripcion']);
    $HistorialASubir= new Historial($idMaquina,$idHistorial,$fecha,$titulo,$descripcion);

    $DAOHistorial->actualizar($HistorialASubir,$conexion);
    header("Location: ../../admin/index.php");
    die();
}else{
    $idMaquina=limpiarDatos($_GET['idMaquina']);
    $HistorialAEditarId=$_GET['idHistorial'];
    $HistorialAEditar= new Historial($HistorialAEditarId,$HistorialAEditarId);
    $Historial=$DAOHistorial->seleccionarUnHistorial($HistorialAEditar,$conexion);
    
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <select name="maquinasDisponibles" id="">
                <option value="<?php echo $Historial->getIdHistorial()?>"><?php echo $idMaquina?></option>
        </select>
        <input type="date" name="fecha" id="" value="<?php echo $Historial->getFecha()?>" required>
        <input   type="text" name="titulo" value="<?php echo $Historial->getTitulo()?>">
        <input type="text" name="descripcion" value="<?php echo $Historial->getDescripcion()?>">
        <input type="submit" value="submit">
    </form>
</body>
</html>