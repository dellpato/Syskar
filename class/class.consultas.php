<?php
require("../cfg/config.php");

class conectorDB extends configuracion
{
	private $conexion;
	
	public function __construct(){
		$this->conexion = parent::conectar();
		return $this->conexion;	
	}
	
	public function consultaBD($consulta,$valores = array()){
		$resultado = false;
		
		if($statement = $this->conexion->prepare($consulta)){
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
		$this->conexion = null;
	}
}

class Persona
{
	public $idd;
	public $puesto;
	public $descripcion;
	
	public function inserta_datos($idd = null, $puesto = null , $descripcion = null){
		$registrar = false;
		
		$consulta = "Call insertar_tipo_puesto(:id,:puesto, :descripcion)";
		$valores = array("id"=>$this->idd,
						"puesto"=>$this->puesto,
						"descripcion"=>$this->descripcion);
		$oConexion = new conectorDB;
		$registrar = $oConexion->consultaBD($consulta,$valores);
		
		if(empty($registrar) or $registrar != false){
			return true;
		}
		else{
			return false;	
		}
	}
	
	public function mostrar_puestos($idd = null){
		$consulta = "Call mostrar_tipo_puesto()";
		$valores = null; //array("id"=>$this->idd);
		
		$oConexion = new conectorDB;
		$this->puestos = $oConexion->consultaBD($consulta,$valores);

		return $this->puestos;
	}
}
?>