<?php
$id=$_GET['id'];


	include("conexion.php");
	$link=Conectarse();

$sql = mysql_query("SELECT d.nombre_departamento, d.descripcion, d.jefe_inmediato FROM departamento_area d, empleado e WHERE d.id_departamento=e.id_departamento AND e.id_empleado=$id", $link);


	$row = mysql_fetch_object($sql);
	$jsondata['nombre_departamento'] = $row->nombre_departamento; 
    $jsondata['descripcion'] = $row->descripcion; 
    $jsondata['jefe_inmediato'] = $row->jefe_inmediato; 
	
 
    echo json_encode($jsondata); 
    
	
mysql_close($link); 
	
	
?>