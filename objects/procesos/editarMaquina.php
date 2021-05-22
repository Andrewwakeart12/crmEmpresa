<?php

require '../../functions.php';
require '../../admin/config.php';

require '../../objects/Maquina.php';
require '../../objects/DAOMaquina.php';
$conexion=conexion($bd_config);

$DAOMaquina= new DAOMaquina();
if(isset($_POST['calcomania']))
 
{  $MaquinaIdDueño= limpiarDatos($_POST['maquinaId']);
    $MaquinaCalcomania= limpiarDatos($_POST['calcomania']);
    $MaquinaEquipo= limpiarDatos($_POST['equipo']);
    $MaquinaMarca= limpiarDatos($_POST['marca']);
    $MaquinaModelo= limpiarDatos($_POST['modelo']);
    $MaquinaStatus= limpiarDatos($_POST['status']);
    $MaquinaUltimoServicio= limpiarDatos($_POST['ultimoServicio']);
    $MaquinaProximoServicio= limpiarDatos($_POST['proximoServicio']);
    $MaquinaASubir= new Maquina($MaquinaIdDueño,$MaquinaCalcomania,$MaquinaEquipo,$MaquinaMarca,$MaquinaModelo,$MaquinaStatus,$MaquinaUltimoServicio,$MaquinaProximoServicio);
    
    $DAOMaquina->actualizar($MaquinaASubir,$conexion);
    header("Location: ../../admin/index.php");
    die();
    
}else{
   
    $MaquinaAEditarId=$_GET['idMaquina'];
    $MaquinaAEditar= new Maquina($MaquinaAEditarId);
    $Maquina=$DAOMaquina->seleccionarUnaMaquina($MaquinaAEditar,$conexion);
    
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
        <input type="hidden" name="maquinaId" value="<?php echo $Maquina->getMaquinaID() ?>">
        <select name="clientesDisponibles" id="">
                <option value="<?php echo $Maquina->getClienteID()?>"><?php echo $Maquina->getClienteID()?></option>
        </select>
        <input type="number" name="calcomania" value="<?php echo $Maquina->getCalcomania()?>">
        <input type="text" name="equipo" id="" value="<?php echo $Maquina->getEquipo()?>">
        <input type="text" name="marca" value="<?php echo $Maquina->getMarca()?>">
        <input type="text" name="modelo" value="<?php echo $Maquina->getModelo()?>">
        <select name="status" id="">
            
                <option value="ok"<?php if($Maquina->getStatus() == "ok"){?> selected <?php }?> >ok</option>
                <option value="f/s" <?php if($Maquina->getStatus() == "f/s"){?> selected <?php }?>>f/s</option>
                <option value="con falla" <?php if($Maquina->getStatus() == "con falla"){?> selected <?php }?>>con falla</option>      
        </select>
        <input type="date" name="ultimoServicio" value="<?php echo $Maquina->getUltimoServicio()?>">
        <input type="date" name="proximoServicio" value="<?php echo $Maquina->getProximoServicio()?>">
        
        <input type="submit" value="submit">

    </form>
</body>
</html>