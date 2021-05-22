<?php
session_start();
require './admin/config.php';
require './objects/Cliente.php';
require_once('functions.php');
require './objects/DAOClient.php';
if(isset($_POST['usuario'])){
    $conexion=conexion($bd_config);
    $usuario= limpiarDatos($_POST['usuario']);
    $contraseña= limpiarDatos($_POST['contraseña']);
    $Cliente= new Cliente($usuario,$usuario,$contraseña);
    $DAOCliente=new DAOClient();
    $clienteR=$DAOCliente->verificarUsuarioCliente($Cliente,$conexion);
    if($clienteR == false){
        echo "usuario o contraseña incorrectos, por favor comuniquese con el propietario si el problema persiste";
    }else{
        $_SESSION['idCliente']= $clienteR->getClienteId();
        header("Location: index.php");
    die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="usuario">
        <input type="password" name="contraseña" required>
        <input type="submit" value="iniciar sesion" required>
    </form>
</body>
</html>