<?
class DAOAdmin{
    public function verificarUsuario($objAdmin,$conexion){
        $c=$conexion;
        $usuario= $objAdmin->getUsuario();
        $sql = "SELECT*FROM admin WHERE usuario=?";
        $sentencia=$c->prepare($sql);
        $sentencia->execute([$usuario]);
        $usuarioR=$sentencia->fetch();
        echo $usuarioR['usuario'];
        
            if($usuarioR['usuario'] == $objAdmin->getUsuario() && $usuarioR['contraseña'] == $objAdmin->getContraseña()){
                $adminId=$usuarioR['idAdmin'];
                $usuario=$usuarioR['usuario'];
               $contraseña=$usuarioR['contraseña']; 
               $adminObj= new Admin($adminId,$usuario,$contraseña);
               return $adminObj;
            }else{
                return false;
            }
        
    }
}
?>