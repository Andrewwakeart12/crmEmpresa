<?php  


 class DAOMaquina{
    var $con;
    public function DAOMaquina(){
        
    }
    public function insertar($objetoMaquina,$conexion){
        $c = $conexion;
        $id= $objetoMaquina->getClienteId();
        $calcomania= $objetoMaquina->getCalcomania();
        $equipo = $objetoMaquina->getEquipo();
        $marca = $objetoMaquina->getMarca();
        $modelo = $objetoMaquina->getModelo();
        $status = $objetoMaquina->getStatus();
        $ulitmoServicio=$objetoMaquina->getUltimoServicio();
        $proximoServicio=$objetoMaquina->getProximoServicio();
        $sql = "INSERT into maquina values(?,NULL,?,?,?,?,?,?,?)";
        
        $sentencia=$c->prepare($sql);
        $sentencia->execute([$id,$equipo,$marca,$modelo,$status,$ulitmoServicio,$proximoServicio,$calcomania]);
        $lastInsertId = $c->lastInsertId();
            if($lastInsertId>0){

            echo "hecho";
            }
            else{
               
            print_r($sentencia->errorInfo()); 
            }
    }
    public function actualizar($objetoMaquina,$conexion){
        $maquinaId= $objetoMaquina->getClienteID();
        $calcomania= $objetoMaquina->getCalcomania();
        $equipo = $objetoMaquina->getEquipo();
        $marca = $objetoMaquina->getMarca();
        $modelo = $objetoMaquina->getModelo();
        $status = $objetoMaquina->getStatus();
        $ulitmoServicio=$objetoMaquina->getUltimoServicio();
        $proximoServicio=$objetoMaquina->getProximoServicio();
        $c = $conexion;
        
        $sql = "UPDATE maquina SET `calcomania`=? ,`equipo`=?, `marca`=? ,`modelo`=?,`status`=?,`ultimoServicio`= ?, `proximoServicio`= ? WHERE `maquina`.`idMaquina` = ?";
        $sentencia=$c->prepare($sql);
        $sentencia->execute([$calcomania,$equipo,$marca,$modelo,$status,$ulitmoServicio,$proximoServicio,$maquinaId]);
        $lastInsertId = $c->lastInsertId();
        
        if($lastInsertId>0){

         echo "hecho";
         }
         else{
            
         print_r($sentencia->errorInfo()); 
         }
    }
    public function eliminar($objetoMaquina,$conexion){
        $maquinaId= $objetoMaquina->getMaquinaId();
        $c = $conexion;
        
        $sql= "DELETE FROM `maquina` WHERE `maquina`.`idMaquina`= ?";
        $sentencia=$c->prepare($sql);
        $sentencia->execute([$maquinaId]);
        $lastInsertId = $c->lastInsertId();
        
        if($lastInsertId>0){

         echo "hecho";
         }
         else{
            
         print_r($sentencia->errorInfo()); 
         }  
}
public function seleccionarUnaMaquina($objetoMaquina,$conexion){
    $maquinaId= $objetoMaquina->getMaquinaId();
    $c = $conexion;
    
    $sql= "SELECT * FROM `maquina` WHERE `maquina`.`idMaquina`= ?";
    $sentencia=$c->prepare($sql);
    $sentencia->execute([$maquinaId]);
    $maquina=$sentencia->fetch();

    $idCliente=$maquina['idCliente'];
    $idMaquina= $maquina['idMaquina'];
    $calcomania = $maquina['calcomania'];
    $equipo = $maquina['equipo'];
    $marca = $maquina['marca'];
    $modelo = $maquina['modelo'];
    $status = $maquina['status'];
    $ultimoServicio = $maquina['ultimoServicio'];
    $proximoServicio = $maquina['proximoServicio'];
    $objMaquina= new Maquina($idCliente,$idMaquina,$calcomania,$equipo,$marca,$modelo,$status,$ultimoServicio,$proximoServicio);
   return $objMaquina;
}
public function seleccionarTodasLasMaquinasDelCliente($objetoMaquina,$conexion){
    $clientId= $objetoMaquina->getClienteID();
    $sql= "SELECT * FROM `maquina` WHERE `maquina`.`idCliente`= ?";
    $c = $conexion;
    $sentencia=$c->prepare($sql);
    $sentencia->execute([$clientId]);
    $obj=$sentencia->fetchAll();
    $arregloMaquinas=[];        
    foreach($obj as $maquina) {
        $idCliente=$maquina['idCliente'];
        $idMaquina= $maquina['idMaquina'];
        $calcomania = $maquina['calcomania'];
        $equipo = $maquina['equipo'];
        $marca = $maquina['marca'];
        $modelo = $maquina['modelo'];
        $status = $maquina['status'];
        $ultimoServicio = $maquina['ultimoServicio'];
        $proximoServicio = $maquina['proximoServicio'];
        $objMaquina= new Maquina($idCliente,$idMaquina,$calcomania,$equipo,$marca,$modelo,$status,$ultimoServicio,$proximoServicio);
        array_push($arregloMaquinas,$objMaquina);
    }
    return $arregloMaquinas;      
}

public function seleccionarMaquinasPendientesDeRevision($objetoMaquina,$conexion){
    $clientId= $objetoMaquina->getClienteId();
    $status='pendiente';
    $sql= "SELECT * FROM `maquina` WHERE (`maquina`.`idCliente`= ?) AND (`maquina`.`status` = `pendiente`)";
    $c = $conexion;
    $sentencia=$c->prepare($sql);
    $sentencia->execute([$clientId]);
    $obj = $sentencia->fetchAll();
    $arregloDePendientes =[];         
    foreach($obj as $maquina) {
        $idCliente=$maquina['idCliente'];
        $idMaquina= $maquina['idMaquina'];
        $calcomania = $maquina['maquina'];
        $equipo = $maquina['equipo'];
        $marca = $maquina['marca'];
        $modelo = $maquina['modelo'];
        $status = $maquina['status'];
        $ultimoServicio = $maquina['ultimoServicio'];
        $proximoServicio = $maquina['proximoServicio'];
        $objMaquina= new Maquina($idCliente,$idMaquina,$calcomania,$equipo,$status,$ultimoServicio,$proximoServicio);
        array_push($arregloDePendientes,$objMaquina);
    }
    return $arregloDePendientes; 
}
}
?>