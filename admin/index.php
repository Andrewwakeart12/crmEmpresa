<?php
session_start();
 require 'config.php';
 require_once('../functions.php');
 require '../objects/DAOClient.php';
 require '../objects/DAOMaquina.php';
 require '../objects/DAOHistorial.php';
 require '../objects/Historial.php';
 require '../objects/Maquina.php';
 require '../objects/Cliente.php';
if(isset($_SESSION['adminUsuario'])){
 $conexion=conexion($bd_config);

 if(!$conexion){
     header('Location:error.php');
 }else{
     $clientes= new DAOClient();
     $clientesArr=$clientes->seleccionarTodosLosClientes($conexion);
        $maquinasPorCliente=[];
        $historialPorMaquina=[];

     $maquinaDAO=new DAOMaquina();
     foreach($clientesArr as $cliente){
       $maquinaDelclienteObj= new Maquina($cliente->getClienteId(),$cliente->getClienteId());  
       $maquinaDeCliente = $maquinaDAO->seleccionarTodasLasMaquinasDelCliente($maquinaDelclienteObj,$conexion);
        array_push($maquinasPorCliente,$maquinaDeCliente);
    }
    foreach ($maquinasPorCliente as $maquinaPorClient){
        foreach($maquinaPorClient as $maquina){
            $maquinaId=$maquina->getMaquinaID();
            $DAOHistorial = new DAOHistorial();
            $objHistorialDeMaquina= new Historial($maquinaId);
            $arregloHistorialDeMaquina=$DAOHistorial->seleccionarHistorialesDeMaquina($objHistorialDeMaquina,$conexion);
            array_push($historialPorMaquina,$arregloHistorialDeMaquina);
        }
    }
    foreach($historialPorMaquina as $historialMaquina){
        foreach($historialMaquina as $historial){
            }
    }
    }
   

}else {
    header("Location: adminLogin.php");
    die();
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
    <?php foreach($clientesArr as $cliente){?>
       <ol>
        <li><h4>Id: <?php echo $cliente->getClienteId()?></h4></li>
        <li><h4>Nombre: <?php echo $cliente->getNombre()?></h4></li>
        <li><h4>Usuario: <?php echo $cliente->getUsuario()?></h4></li>
        <li><h4>Contraseña: <?php echo $cliente->getContraseña()?></h4></li>
        <li>
        <form action="./objects/procesos/borrarCliente.php" method="post">
            <input type="hidden" name="idCliente" value="<?php echo $cliente->getClienteId()?>">
            <input type="submit" value="delete">
        </form>
       <form action="./objects/procesos/editarCliente.php" method="get">
            <input type="hidden" name="idCliente" value="<?php echo $cliente->getClienteId()?>">
            <input type="submit" value="editar">
        </form>
 
        </li>
        <?php foreach($maquinasPorCliente as $maquinaPorClient){?>
            <?php foreach($maquinaPorClient as $maquina){?>
                <?php if($cliente->getClienteId()==$maquina->getClienteID()){?>
                <ol>
                <li><h4>MaquinaID: <?php echo $maquina->getMaquinaID()?></h4></li>
                <li><h4>Calcomania: <?php echo $maquina->getCalcomania()?></h4></li>
                
                <li><h4>Marca: <?php echo $maquina->getMarca()?></h4></li>
                <li><h4>Modelo:<?php echo $maquina->getModelo()?></h4></li>
                <li><h4>Status: <?php echo $maquina->getStatus()?></h4></li>
                <li><h4>Ultimo servicio: <?php echo $maquina->getUltimoServicio()?></h4></li>
                <li><h4>Proximo servicio: <?php echo $maquina->getProximoServicio()?></h4></li>
                
                <form action="./objects/procesos/borrarMaquina.php" method="post">
                <input type="hidden" name="maquinaId" value="<?php echo $maquina->getMaquinaID()?>">
                 <input type="submit" value="delete">
                </form>
                <form action="./objects/procesos/editarMaquina.php" method="get">
                <input type="hidden" name="idMaquina" value="<?php echo $maquina->getMaquinaID()?>">
                 <input type="submit" value="editar">
                </form>
               <?php foreach($historialPorMaquina as $historialMaquina){?>
                <?php foreach($historialMaquina as $historial){?>
                    <?php if($maquina->getMaquinaID() == $historial->getIdMaquina()){?>
                        <ol>
                            <li><h4>ID Maquina: <?php echo $historial->getIdMaquina()?></h4></li>
                            <li><h4>ID Historial: <?php echo $historial->getIdHistorial()?></h4></li>
                            <li><h4>Fecha: <?php echo $historial->getFecha()?></h4></li>
                            <li><h4>Titulo: <?php echo $historial->getTitulo()?></h4></li>
                            <li><h4>Descripcion: <?php echo $historial->getDescripcion()?></h4></li>
                             <li>
                             <form action="./objects/procesos/borrarHistorial.php" method="post">
                             <input type="hidden" name="idHistorial" value="<?php echo $historial->getIdHistorial()?>">
                             <input type="submit" value="delete">
                             </form>
                             <form action="./objects/procesos/editarHistorial.php">
                                <input type="hidden" name="idHistorial" value="<?php echo $historial->getIdHistorial()?>">

                                <input type="hidden" name="idMaquina" value="<?php echo $historial->getIdMaquina()?>">
                                <input type="submit" value="editar">
                             </form>
                             </li>
                        </ol>
                        
                    <?php }?>
                    <?php }?> 
               
                <?php }?> 
                </ol>   
                <?php }?>
            <?php }?>
        <?php }?>
       </ol>
               
        
    <?php }?>
    
    <form action="./objects/procesos/insertarCliente.php" method="post">
        <input type="text" name="nombre">
        <input type="text" name="usuario">
        <input type="password" name="contraseña" id="">
        <input type="submit" value="submit">
    </form>
    <form action="./objects/procesos/insertarMaquina.php" method="post">
        <select name="clientesDisponibles" id="">
            <?php foreach($clientesArr as $cliente){?>
                <option value="<?php echo $cliente->getClienteId()?>"><?php echo $cliente->getClienteId()?></option>
            <?php }?>
        </select>
        <input type="number" name="calcomania">
        <input type="text" name="equipo" id="">
        <input type="text" name="marca">
        <input type="text" name="modelo">
        <select name="status" id="">
                <option value="ok">ok</option>
                <option value="f/s">f/s</option>
                <option value="con falla">con falla</option>      
        </select>
        <input type="date" name="ultimoServicio">
        <input type="date" name="proximoServicio">
        
        <input type="submit" value="submit">
    </form>
    <form action="./objects/procesos/insertarHistorial.php" method="post">
        <select name="maquinasDisponibles" id="">
            <?php foreach($maquinasPorCliente as $maquinaPorCLiente){?>
                <?php foreach($maquinaPorCLiente as $maquina){?>
                <option value="<?php echo $maquina->getMaquinaID()?>"><?php echo $maquina->getMaquinaID()?></option>
                <?php }?>
            <?php }?>
        </select>
        <input type="date" name="fecha" id="" required>
        <input type="text" name="titulo">
        <input type="text" name="descripcion">
        <input type="submit" value="submit">
    </form>
    <form action="cerrarSesion.php">
                <input type="submit" value="cerrar sesion">
    </form>
</body>
</body>

</html>