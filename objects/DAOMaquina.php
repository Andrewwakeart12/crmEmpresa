<?php  
require '../admin/config.php';
require 'functions.php';

 class DAOMaquina{
    var $con;
    var $bd_config=$bd_config;
    public function DAOMaquina(){
        
    }
    public function insertar($objetoMaquina){
        $c = conexion($this->bd_config);
        $id= $objetoMaquina->getClienteId();
        $calcomania= $objetoMaquina->getCalcomania();
        $equipo = $objetoMaquina->getEquipo();
        $marca = $objetoMaquina->getMarca();
        $modelo = $objetoMaquina->getModelo();
        $status = $objetoMaquina->getStatus();
        $ulitmoServicio=$objetoMaquina->getUltimoServicio();
        $proximoServicio=$objetoMaquina->getProximoServicio();
        $sql = "INSERT into maquina values($id,NULL,$calcomania,$equipo,$marca,$modelo,$status,$ulitmoServicio,$proximoServicio)";
        
        if(!!$c->query($sql)){
            print "Error al insertar";
        }else{
            print '<script languaje="Javascript"> alert("guardado");</script>';
        }
    }
    public function actualizar($objetoMaquina,$conexion){
        $clietId= $objetoMaquina->getClienteId();
        $maquinaId= $objetoMaquina->getMaquinaId();
        $calcomania= $objetoMaquina->getCalcomania();
        $equipo = $objetoMaquina->getEquipo();
        $marca = $objetoMaquina->getMarca();
        $modelo = $objetoMaquina->getModelo();
        $status = $objetoMaquina->getStatus();
        $ulitmoServicio=$objetoMaquina->getUltimoServicio();
        $proximoServicio=$objetoMaquina->getProximoServicio();
        $c = $conexion;
        
        $sql = "UPDATE maquina SET `calcomania`=$calcomania `equipo`=$equipo `marca`=$marca `modelo`=$modelo,`status`=$status`ultimoServicio` `ultimoServicio`= $ulitmoServicio `ultimoServicio`=$proximoServicio WHERE `maquina`.`idMaquina` = $maquinaId";
        if($c->query($sql)===TRUE){
            echo "update exitoso";
        }else{
            echo "error al actualizar" . $c->error;
        }
    }
    public function eliminar($objetoMaquina){
        $clietId= $objetoMaquina->getClienteId();
        $maquinaId= $objetoMaquina->getMaquinaId();
        $calcomania= $objetoMaquina->getCalcomania();
        $equipo = $objetoMaquina->getEquipo();
        $marca = $objetoMaquina->getMarca();
        $modelo = $objetoMaquina->getModelo();
        $status = $objetoMaquina->getStatus();
        $ulitmoServicio=$objetoMaquina->getUltimoServicio();
        $proximoServicio=$objetoMaquina->getProximoServicio();
        $c = conexion($this->bd_config);
        
        $sql= "DELETE FROM `maquina` WHERE `maquina`.`idMaquina`= $maquinaId";
        if($c->query($sql)===TRUE){
            echo "update exitoso";
        }else{
            echo "error al actualizar" . $c->error;
        }
}
public function seleccionarUnaMaquina($objetoMaquina,$conexion){
    $maquinaId= $objetoMaquina->getMaquinaId();
    $c = $conexion;
    
    $sql= "SELECT * FROM `maquina` WHERE `maquina`.`idMaquina`= $maquinaId";
    $sentencia=$c->prepare($sql);
    $sentencia->execute();
    $maquina=$sentencia->fetchAll();

    $idCliente=$maquina.['idCliente'];
    $idMaquina= $maquina.['idMaquina'];
    $calcomania = $maquina.['maquina'];
    $equipo = $maquina.['equipo'];
    $marca = $maquina.['marca'];
    $modelo = $maquina.['modelo'];
    $status = $maquina.['status'];
    $ultimoServicio = $maquina.['ultimoServicio'];
    $proximoServicio = $maquina.['proximoServicio'];
    $objMaquina= new Maquina($idCliente,$idMaquina,$calcomania,$equipo,$status,$ultimoServicio,$proximoServicio);
   return $objMaquina;
}
public function seleccionarTodasLasMaquinasDelCliente($objetoMaquina){
    $clientId= $objetoMaquina->getClienteID();
    $sql= "SELECT * FROM `maquina` WHERE `maquina`.`idCliente`= $clientId";
    $c = conexion($this->bd_config);
    $sentencia=$c->prepare($sql);
    $sentencia->execute();
    $obj=$sentencia->fetchAll();
    $arregloMaquinas=[];        
    foreach($obj as $maquina) {
        $idCliente=$maquina.['idCliente'];
        $idMaquina= $maquina.['idMaquina'];
        $calcomania = $maquina.['maquina'];
        $equipo = $maquina.['equipo'];
        $marca = $maquina.['marca'];
        $modelo = $maquina.['modelo'];
        $status = $maquina.['status'];
        $ultimoServicio = $maquina.['ultimoServicio'];
        $proximoServicio = $maquina.['proximoServicio'];
        $objMaquina= new Maquina($idCliente,$idMaquina,$calcomania,$equipo,$status,$ultimoServicio,$proximoServicio);
        array_push($arregloMaquinas,$objMaquina);
    }
    return $arregloMaquinas;      
}

public function seleccionarMaquinasPendientesDeRevision($objetoMaquina){
    $clientId= $objetoMaquina->getClienteId();
    $status='pendiente';
    $sql= "SELECT * FROM `maquina` WHERE (maquina`.`idCliente`= $clientId) AND (`maquina`.`status` = pendiente)";
    $c = conexion($this->bd_config);
    $sentencia=$c->prepare($sql);
    $sentencia->execute();
    $obj = $sentencia->fetchAll();
    $arregloDePendientes =[];         
    foreach($obj as $maquina) {
        $idCliente=$maquina.['idCliente'];
        $idMaquina= $maquina.['idMaquina'];
        $calcomania = $maquina.['maquina'];
        $equipo = $maquina.['equipo'];
        $marca = $maquina.['marca'];
        $modelo = $maquina.['modelo'];
        $status = $maquina.['status'];
        $ultimoServicio = $maquina.['ultimoServicio'];
        $proximoServicio = $maquina.['proximoServicio'];
        $objMaquina= new Maquina($idCliente,$idMaquina,$calcomania,$equipo,$status,$ultimoServicio,$proximoServicio);
        array_push($arregloDePendientes,$objMaquina);
    }
    return $arregloDePendientes; 
}
}
?>