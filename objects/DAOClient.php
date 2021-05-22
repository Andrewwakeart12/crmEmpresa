<?php 
class DAOClient{
    var $con;
    
    public function DAOClient(){}

    public function insertar($objetoCliente,$conexion){
            $c = $conexion;
            $nombre= $objetoCliente->getNombre();
            $usuario= $objetoCliente->getUsuario();
            $contraseña=$objetoCliente->getContraseña();
            $sql = "INSERT INTO `clientes` (`idCliente`, `nombre`, `usuario`, `contraseña`) VALUES (NULL,?,?,? )";
            $sentencia=$c->prepare($sql);          
            $sentencia->execute([$nombre,$usuario,$contraseña]);
            $lastInsertId = $c->lastInsertId();
            if($lastInsertId>0){

            echo "hecho";
            }
            else{
               
            print_r($sentencia->errorInfo()); 
            }
        }
        public function actualizar($objetoCliente,$conexion){
            $clientId= $objetoCliente->getClienteId();
            $nombre= $objetoCliente->getNombre();
            $usuario= $objetoCliente->getUsuario();
            $contraseña=$objetoCliente->getContraseña();
            
            $c = $conexion;
            
            $sql = "UPDATE clientes SET nombre=? ,usuario=? ,contraseña=? WHERE clientes.idCliente= ?";
           $sentencia=$c->prepare($sql);
           $sentencia->execute([$nombre,$usuario,$contraseña,$clientId]);
           $lastInsertId = $c->lastInsertId();
           if($lastInsertId>0){

            echo "hecho";
            }
            else{
               
            print_r($sentencia->errorInfo()); 
            }
        }
        public function eliminar($objetoCliente,$conexion){
            $clientId= $objetoCliente->getClienteId();
            $c = $conexion;
            $sql= "DELETE FROM `clientes` WHERE `clientes`.`idCliente`= ?";
            $lastInsertId = $c->lastInsertId();
            $sentencia=$c->prepare($sql);
           $sentencia->execute([$clientId]);
            if($lastInsertId>0){

                echo "hecho";
                }
                else{
                   
                print_r($sentencia->errorInfo()); 
                }
    }
    public function seleccionarUnCliente($objetoCliente,$conexion){
        
        $clientId= $objetoCliente->getClienteId();
        $c = $conexion;
        
        $sql= "SELECT * FROM `clientes` WHERE `clientes`.`idCliente`= ?";
        $sentencia=$c->prepare($sql);
        $sentencia->execute([$clientId]);
        $cliente=$sentencia->fetch();
        
        $clientId= $cliente['idCliente'];
        $nombre= $cliente['nombre'];
        $usuario= $cliente['usuario'];
        $contraseña=$cliente['contraseña'];
        $objCliente= new Cliente($clientId,$nombre,$usuario,$contraseña);
       return $objCliente;
    }
    
    public function seleccionarTodosLosClientes($conexion){
        $sql= "SELECT * FROM clientes";
        $c = $conexion;
        $sentencia=$c->prepare($sql);
        $sentencia->execute();
        $obj=$sentencia->fetchAll();
        $arregloClientes=[];        
        foreach($obj as $cliente) {
            $clientId= $cliente['idCliente'];
            $nombre= $cliente['nombre'];
            $usuario= $cliente['usuario'];
            $contraseña=$cliente['contraseña'];
            $objCliente= new Cliente($clientId, $nombre,$usuario,$contraseña);
            array_push($arregloClientes,$objCliente);
        }
        return $arregloClientes;      
    }
    public function verificarUsuarioCliente($objCliente,$conexion){
        $c=$conexion;
        $usuarioCliente= $objCliente->getUsuario();
        $sql = "SELECT*FROM clientes WHERE usuario=?";
        $sentencia=$c->prepare($sql);
        $sentencia->execute([$usuarioCliente]);
        $usuarioR=$sentencia->fetch();
        echo $usuarioR['usuario'];
        
            if($usuarioR['usuario'] == $objCliente->getUsuario() && $usuarioR['contraseña'] == $objCliente->getContraseña()){
                $clienteId=$usuarioR['idCliente'];
                $usuario=$usuarioR['usuario'];
               $contraseña=$usuarioR['contraseña']; 
               $clienteObj= new Cliente($clienteId,$usuario,$usuario,$contraseña);
               return $clienteObj;
            }else{
                return false;
            }
    }     
    }

?>