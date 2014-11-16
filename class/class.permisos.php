<?php 
require("../cfg/config.php");

class conectaDB extends configuracion
{
	private $conex;
	
	public function __construct(){
		$this->conex = parent::conectar();
		return $this->conex;	
	}
	
	public function queryBD($consulta,$valores = array()){
		$resultado = false;
		
		if($statement = $this->conex->prepare($consulta)){
			if(preg_match_all("/(:\w+)/",$consulta,$campo,PREG_PATTERN_ORDER)){
				$campo = array_pop($campo);
				foreach ($campo as $parametro){
					$statement->bindValue($parametro,$valores[substr($parametro,1)]);
				}	
			}
			try{
				if(!$statement->execute()){
					print_r($statement->errorInfo());
				}
				$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
				$statement->closeCursor();
			}
			catch(PDOException $evento){
				echo "error en ejecución";
			}
		}
		return $resultado;
		$this->conex = null;
	}
}//Fin de la Clase ConectaDB


//Funcion para realizar select en la base de datos
class realizar_consulta {

	public $codigo;

	public function consulta(){
		$consulta = "CALL datos_empleado(:id);";
		$valores = array("id" => $this->codigo);
		
		$Conexion = new conectaDB;
		$this->subconsulta = $Conexion->queryBD($consulta,$valores);

		return $this->subconsulta;
	}
}
class guarda_vacaciones {
	public $codigo;
	public $fecha;
	public $observaciones;
	
	public function ingreso_vacaciones(){
		$consulta = "CALL ingreso_solicitud_vacaciones(:id_emp,:fec,:obs);";
		$valor  = array("id_emp" => $this->codigo,
						"fec" => $this->fecha,
						"obs" => $this->observaciones);
		$conex = new conectaDB;
		$registrar = $conex->queryBD($consulta,$valor);
		
		if(empty($registrar) or $registrar != false){
			return true;
		}
		else{
			return false;	
		}
	}
}
?>