<?php

class DAOHistorial{
    public function insertar($historial,$conexion){
        $historialIdMaquina= $historial->getIdMaquina();
        $historialFecha= $historial->getFecha();
        $historialTitulo= $historial->getTitulo();
        $historialDescripcion= $historial->getDescripcion();
        
        
        $c = $conexion;
        $sql = "INSERT into historial values(?,NULL,?,?,?)";
        
        $sentencia=$c->prepare($sql);
        $sentencia->execute([$historialIdMaquina,$historialFecha,$historialTitulo,$historialDescripcion]);
        $lastInsertId = $c->lastInsertId();
            if($lastInsertId>0){

            echo "hecho";
            }
            else{
               
            print_r($sentencia->errorInfo()); 
            }
    }

    public function actualizar($historial,$conexion){
        $historialIdMaquina= $historial->getIdMaquina();
        $historialIdHistorial= $historial->getIdHistorial();
        
        $historialFecha= $historial->getFecha();
        $historialTitulo= $historial->getTitulo();
        $historialDescripcion= $historial->getDescripcion();
        
        
        $c = $conexion;
        $sql = "UPDATE historial SET fecha=? , titulo=?,descripcion=?  WHERE idHistorial= ?";
         
        $sentencia=$c->prepare($sql);
        $sentencia->execute([$historialFecha,$historialTitulo,$historialDescripcion,$historialIdHistorial]);
        $lastInsertId = $c->lastInsertId();
            if($lastInsertId>0){

            echo "hecho";
            }
            else{
               
            print_r($sentencia->errorInfo()); 
            }
    }
    public function eliminar($objetoHistorial,$conexion){
        $historialId= $objetoHistorial->getIdHistorial();
        $c = $conexion;
        $sql= "DELETE FROM historial WHERE idHistorial= ?";
        $lastInsertId = $c->lastInsertId();
        $sentencia=$c->prepare($sql);
       $sentencia->execute([$historialId]);
        if($lastInsertId>0){

            echo "hecho";
            }
            else{
               
            print_r($sentencia->errorInfo()); 
            }
}
    public function seleccionarHistorialesDeMaquina($historial,$conexion){
        $historialIdMaquina= $historial->getIdMaquina();
        $c = $conexion;
        $sql = "SELECT * FROM historial WHERE idMaquina=?";
         
        $sentencia=$c->prepare($sql);
        $sentencia->execute([$historialIdMaquina]);
        $historialDeLaMaquina=$sentencia->fetchAll();
        $historialFinal=[];
        $lastInsertId = $c->lastInsertId();
    

        foreach($historialDeLaMaquina as $historial){
            $historiaIdMaquina=$historial['idMaquina'];
            $historiaIdHistorial=$historial['idHistorial'];
            $historialFecha=$historial['fecha'];
            $historiaTitulo=$historial['titulo'];
            $historialDescripcion=$historial['descripcion'];
            
            $objHistoria= new Historial($historiaIdMaquina,$historiaIdHistorial,$historialFecha,$historiaTitulo,$historialDescripcion);

            array_push($historialFinal,$objHistoria);
        }
        return $historialFinal;
        
    }
    public function seleccionarUnHistorial($historial,$conexion){
        $historialIdHistorial= $historial->getIdHistorial();
        $c = $conexion;
        $sql = "SELECT * FROM historial WHERE idHistorial=?";
         
        $sentencia=$c->prepare($sql);
        $sentencia->execute([$historialIdHistorial]);
        $historialDeLaMaquina=$sentencia->fetch();
        $historialObjIdMaquina=$historialDeLaMaquina['idMaquina'];
        $historialObjIdHistorial=$historialDeLaMaquina['idHistorial'];
        $historialObjFecha=$historialDeLaMaquina['fecha'];
        $historialObjTitulo=$historialDeLaMaquina['titulo'];
        $historialObjDescripcion=$historialDeLaMaquina['descripcion'];
        $HistorialMaquinaFinal=new Historial($historialObjIdMaquina,$historialObjIdHistorial,$historialObjFecha,$historialObjTitulo,$historialObjDescripcion);
        $lastInsertId = $c->lastInsertId();
        
        return $HistorialMaquinaFinal;
        
      
    }
}
?>