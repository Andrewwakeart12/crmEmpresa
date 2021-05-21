<?php 
class Historial{
    private $idMaquina;
    private $idHistorial;
    private $fecha;
    private $titulo;
    private $descripcion;

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

	function __construct2( $idMaquina,$idHistorial){
		$this->idMaquina = $idMaquina;
        $this->idHistorial = $idHistorial;
	}

    function __construct3( $idMaquina,$idHistorial,$fecha){
		$this->idMaquina = $idMaquina;
        $this->idHistorial = $idHistorial;
        $this->fecha = $fecha;
    }
    function __construct4( $idMaquina,$fecha,$titulo,$descripcion){
		$this->idMaquina = $idMaquina;
        $this->fecha = $fecha;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
    }
	function __construct5( $idMaquina,$idHistorial,$fecha,$titulo,$descripcion){
		$this->idMaquina = $idMaquina;
        $this->idHistorial = $idHistorial;
        $this->fecha = $fecha;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
	}
	public function getIdMaquina(){
		return $this->idMaquina;
	}

	public function getIdHistorial(){
		return $this->idHistorial;
	}

	public function getFecha(){
		return $this->fecha;
	}
	public function setFecha($fecha){
		$this->fecha=$fecha;
	}

	public function getTitulo(){
		return $this->titulo;
	}
	public function setTitulo($titulo){
		$this->titulo=$titulo;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}
	public function setDescripcion($descripcion){
		$this->descripcion=$descripcion;
	}
}
?>