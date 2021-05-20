<?php 
 class Cliente{
    private $clienteId;
	private $nombre;
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
	function __construct1($clienteId)
	{       $this->clienteId = $clienteId;
			

	}
	function __construct2($clienteId,$nombre)
	{       $this->clienteId = $clienteId;
			$this->nombre= $nombre;

	}
	function __construct3($nombre,$usuario,$contraseña)
	{   	$this->nombre= $nombre;    
			$this->usuario= $usuario;
			$this->contraseña= $contraseña;
		}
	function __construct4($clienteId,$nombre,$usuario,$contraseña)
	{   	$this->clienteId= $clienteId;
			$this->nombre= $nombre;    
			$this->usuario= $usuario;
			$this->contraseña= $contraseña;
		}
    function getNombre(){
        return $this->nombre;
    }
    
    function setNombre($nombre){
        $this->nombre= $nombre;

    }
    function getClienteId(){
        return $this->clienteId;
    }
	function getUsuario(){
		return $this->usuario;
	}
	function getContraseña(){
		return $this->contraseña;
	}
	function setContraseña($contraseña){
		$this->contraseña = $contraseña;
	}
 }
 
?>