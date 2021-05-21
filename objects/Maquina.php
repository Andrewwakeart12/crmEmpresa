<?php 
 class Maquina{
	private  $idCliente;
	private  $idMaquina;
	private  $calcomania;
	private  $equipo;
	private  $marca;
	private  $modelo;
	private  $status;
	private  $ultimoServicio;
	private  $proximoServicio;

    function __construct()
	{
		//obtengo un array con los parámetros enviados a la función
		//saco el número de parámetros que estoy recibiendo
		$params = func_get_args();
		$numParams = func_num_args();
		//atendiendo al siguiente modelo __construct1() __construct2()...
		$funcionConstructor ='__construct'.$numParams;
		//compruebo si hay un constructor con ese número de parámetros
		if (method_exists($this,$funcionConstructor)) {
			//si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
			call_user_func_array(array($this,$funcionConstructor),$params);
		}
	}
	function __construct1( $idMaquina){
		$this->idMaquina = $idMaquina;
	}

	function __construct2($idCliente, $idMaquina){
		$this->idCliente = $idCliente;
		$this->idMaquina = $idMaquina;
	}
	
	function __construct3($idCliente, $idMaquina, $calcomania){
		$this->idCliente = $idCliente;
		$this->idMaquina = $idMaquina;
		$this->calcomania= $calcomania;
	}

	function __construct4( $idCliente,  $idMaquina, $calcomania,  $equipo){
		$this->idCliente = $idCliente;
		$this->idMaquina = $idMaquina;
		$this->calcomania= $calcomania;
		$this->equipo = $equipo;
	}

	function __construct5( $idCliente,  $idMaquina, $calcomania,  $equipo, $marca,  $modelo){
		$this->idCliente = $idCliente;
		$this->idMaquina = $idMaquina;
		$this->calcomania= $calcomania;
		$this->equipo = $equipo;
		$this->modelo = $modelo;
	}

	function __construct6($idCliente,$idMaquina,$calcomania,$equipo,$marca,$modelo){
		$this->idCliente = $idCliente;
		$this->idMaquina = $idMaquina;
		$this->calcomania= $calcomania;
		$this->equipo = $equipo;
		$this->modelo = $modelo;
		$this->marca = $marca;
		}

	function __construct7( $idCliente,  $idMaquina, $calcomania,  $equipo, $marca,  $modelo, $status){
		$this->idCliente = $idCliente;
		$this->idMaquina = $idMaquina;
		$this->calcomania= $calcomania;
		$this->equipo = $equipo;
		$this->modelo = $modelo;
		$this->marca = $marca;
		$this->status = $status;
	}
	function __construct8( $idCliente, $calcomania, $equipo, $marca,  $modelo, $status,$ultimoServicio,$proximoServicio){
		$this->idCliente = $idCliente;
		$this->calcomania= $calcomania;
		$this->equipo = $equipo;
		$this->modelo = $modelo;
		$this->marca = $marca;
		$this->status = $status;
		$this->ultimoServicio = $ultimoServicio;
		$this->proximoServicio = $proximoServicio;
	}

	function __construct9( $idCliente,  $idMaquina, $calcomania,  $equipo, $marca,  $modelo, $status,$ultimoServicio,$proximoServicio){
		$this->idCliente = $idCliente;
		$this->idMaquina = $idMaquina;
		$this->calcomania= $calcomania;
		$this->equipo = $equipo;
		$this->modelo = $modelo;
		$this->marca = $marca;
		$this->status = $status;
		$this->ultimoServicio = $ultimoServicio;
		$this->proximoServicio = $proximoServicio;
	}
	function getMaquinaID(){
		return $this->idMaquina;
	}

	function getClienteID(){
		return $this->idCliente;
	}
	
	function getEquipo(){
		return $this->equipo;
	}
	
	function setEquipo($equipo){
		$this->equipo=$equipo;
	}
	
	function getMarca(){
		return $this->marca;
	}
	
	function setMarca($marca){
		$this->marca=$marca;
	}

	function getModelo(){
		return $this->modelo;
	}
	
	function setModelo($modelo){
		$this->modelo=$modelo;
	}
	function getStatus(){
		return $this->status;
	}
	function setStatus($status){
		$this->status=$status;
	}
	function getUltimoServicio(){
		return $this->ultimoServicio;
	}
	function setUltimoServicio($ultimoServicio){
		$this->ultimoServicio=$ultimoServicio;
	}
	function getProximoServicio(){
		return $this->proximoServicio;
	}

	function setProximoServicio($proximoServicio){
		$this->proximoServicio=$proximoServicio;
	}
	function getCalcomania(){
		return $this->calcomania;
	}

	function setCalcomania($calcomania){
		$this->calcomania=$calcomania;
	}
	
 }
 
?>