<?php
 require 'admin/config.php';
 require 'functions.php';
 require './objects/DAOClient.php';
 require './objects/Cliente.php';
 $conexion=conexion($bd_config);

 if(!$conexion){
     header('Location:error.php');
 }else{
     $clientes= new DAOClient();
     $clientesArr=$clientes->seleccionarTodosLosClientes($conexion);
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
        <h4>Id: <?php echo $cliente->getClienteId()?></h4>
        <h4>Nombre: <?php echo $cliente->getNombre()?></h4>
        <h4>Usuario: <?php echo $cliente->getUsuario()?></h4>
        <h4>Contraseña: <?php echo $cliente->getContraseña()?></h4>
        <form action="delete.php" method="post">
            <input type="hidden" name="idCliente" value="<?php echo $cliente->getClienteId()?>">
            <input type="submit" value="delete">
        </form>
       <form action="editar.php" method="get">
            <input type="hidden" name="idCliente" value="<?php echo $cliente->getClienteId()?>">
            <input type="submit" value="editar">
        </form>
    <?php }?>
    
    <form action="insertarCliente.php" method="post">
        <input type="text" name="nombre">
        <input type="text" name="usuario">
        <input type="password" name="contraseña" id="">
        <input type="submit" value="submit">
    </form>
</body>
</html>