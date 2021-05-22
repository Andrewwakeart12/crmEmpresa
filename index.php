<?php 
session_start();
require './objects/DAOClient.php';
require './objects/Cliente.php';
require './functions.php';
require './admin/config.php';

require './objects/DAOMaquina.php';
require './objects/Maquina.php';

require './objects/DAOHistorial.php';
require './objects/Historial.php';

$conexion = conexion($bd_config);
if(isset($_SESSION['idCliente'])){
    $clienteEnSesion = new Cliente($_SESSION['idCliente']);
    $DAOCliente= new DAOClient();
    $cliente=$DAOCliente->seleccionarUnCliente($clienteEnSesion,$conexion);
    $DAOMaquina= new DAOMaquina();
    $maquinasDelCliente=$DAOMaquina->seleccionarTodasLasMaquinasDelCliente($cliente,$conexion);
    $historialMaquinas = [];
    foreach($maquinasDelCliente as $maquina){
        $maquinaID=$maquina->getMaquinaID();
        $DAOHistorial = new DAOHistorial();
        $maquinaHistorialObj=new Historial($maquinaID);
        $HistorialDeLaMaquina=$DAOHistorial->seleccionarHistorialesDeMaquina($maquinaHistorialObj,$conexion);
        array_push($historialMaquinas,$HistorialDeLaMaquina);
    }
   
}else{
    header("Location: clienteLogin.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
    <h4>informacion del cliente:</h4>
    <ol>
        <li>Id del cliente: <?php echo $cliente->getClienteId()?></li>
        <li>Nombre del cliente: <?php echo $cliente->getNombre()?></li>
        <li>Nombre de usuario del cliente: <?php echo $cliente->getUsuario()?></li>
    </ol>
    <h4>maquinas del cliente: </h4>
    
    <?php foreach($maquinasDelCliente as $maquina){?>
        <ol>
    <li>MaquinaId: <?php echo $maquina->getMaquinaID()?></li>
    <li>Calcomania: <?php echo $maquina->getCalcomania()?></li>
    <li>Equipo: <?php echo $maquina->getEquipo()?></li>
    <li>Marca: <?php echo $maquina->getMarca()?></li>
    <li>Modelo: <?php echo $maquina->getModelo()?></li>
    <li>Status: <?php echo $maquina->getStatus()?></li>
    <li>Ultimo Servicio: <?php echo $maquina->getUltimoServicio()?></li>
    <li>Proximo Servicio: <?php echo $maquina->getProximoServicio()?></li>
    <?php if(!empty($historialMaquinas[0])){?>
    <h4>Historial de la maquina: </h4>
    <?php }?>
        <?php    foreach ($historialMaquinas as $historial){ ?>
            <?php foreach($historial as $historialF){?>
                <?php if($historialF->getIdMaquina() == $maquina->getMaquinaID()){?>
        
     
            <ol>
                <li>Id de la maquina a la que pertenece: <?php echo $historialF->getIdMaquina()?></li>
                <li>Fecha: <?php echo $historialF->getFecha()?></li>
                <li>Titulo: <?php echo $historialF->getTitulo()?></li>
                <li>Descripcion: <?php echo $historialF->getDescripcion()?></li>
            
            </ol>
            <br>
            <?php }?>
         <?php }?>
         <?  }?>     
        
    </ol>
    <?}?>
    <form action="cerrarSesion.php">
        <input type="submit" value="cerrar sesion">
    </form>
</body>
</html>