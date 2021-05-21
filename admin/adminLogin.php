<?php 
 require 'config.php';
require '../objects/Admin.php';
require_once('../functions.php');
require '../objects/DAOAdmin.php';

session_start();

if(isset($_POST['usuario']))
{
    $conexion=conexion($bd_config);
    $usuario= limpiarDatos($_POST['usuario']);
    $contraseña= limpiarDatos($_POST['contraseña']);
    $Admin= new Admin($usuario,$contraseña);
    $DAOAdmin= new DAOAdmin();
    $AdminResult=$DAOAdmin->verificarUsuario($Admin,$conexion);
    if($AdminResult== false){
        echo "usuario o contraseña no validos";
    }else{
        $_SESSION['idAdmin'] = $AdminResult->getAdminId();
        $_SESSION['adminUsuario'] = $AdminResult->getUsuario();
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