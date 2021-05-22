<?php

require '../../functions.php';
require '../../admin/config.php';

require '../../objects/Cliente.php';
require '../../objects/DAOClient.php';
$conexion=conexion($bd_config);

$DAOCliente= new DAOClient();
if(isset($_POST['nombre']))
 
{   $clientId=limpiarDatos($_POST['idClient']);
    $nombre=limpiarDatos($_POST['nombre']);
    $usuario=limpiarDatos($_POST['usuario']);
    $contraseña=limpiarDatos($_POST['contraseña']);
    $clienteASubir= new Cliente($clientId,$nombre,$usuario,$contraseña);
    
    $DAOCliente->actualizar($clienteASubir,$conexion);
    header("Location: ../../admin/index.php");
    die();
}else{
   
    $clienteAEditarId=$_GET['idCliente'];
    $clienteAEditar= new Cliente($clienteAEditarId);
    $cliente=$DAOCliente->seleccionarUnCliente($clienteAEditar,$conexion);
    
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
    <input type="hidden" name="idClient" value="<?php echo $cliente->getClienteId()?>">
    <input type="text" name="nombre" value="<?php echo $cliente->getNombre()?>">
    <input type="text" name="usuario"value="<?php echo $cliente->getUsuario()?>">
    <input type="text" name="contraseña" value="<?php echo $cliente->getContraseña()?>">
    <input type="submit" value="actualizar">
    </form>
</body>
</html>