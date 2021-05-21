<?php
class Admin{
    private $adminId;
    private $usuario;
    private $contraseña;

    function __construct()
	{
		//obtengo un array con los parámetros enviados a la función
		$params = func_get_args();
		//saco el número de parámetros que estoy recibiendo
		$numParams = func_num_args();
		//atendiendo al siguiente modelo __construct1() __construct2()...
		$funcionConstructor ='__construct'.$numParams;
		//compruebo si hay un constructor con ese número de parámetros
		if (method_exists($this,$funcionConstructor)) {
			//si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
			call_user_func_array(array($this,$funcionConstructor),$params);
		}
	}
	function __construct1($adminId)
	{       
        $this->adminId = $adminId;
	}
	function __construct2($usuario,$contraseña)
	{       
			$this->usuario= $usuario;
            $this->contraseña= $contraseña;

	}
	function __construct3($adminId,$usuario,$contraseña)
	{       $this->adminId = $adminId;
			$this->usuario= $usuario;
			$this->contraseña= $contraseña;

	}
    function getAdminId(){
        return $this->adminId;
    }
    function getUsuario(){
        return $this->usuario;
    }

    function setUsuario($usuario){
        $this->usuario=$usuario;
    }

    function getcontraseña(){
        return $this->contraseña;
    }
    function setcontraseña($contraseña){
        $this->contraseña=$contraseña;
    }
}
?>