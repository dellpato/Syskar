<?php
	include("conexion.php");
	$link=Conectarse();


$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$id=$_POST['id'];


mysql_query("INSERT INTO jefe(id_jefe, nombre, descripcion) VALUES('$id', '$nombre', '$descripcion')", $link);
			

$jsondata['devuelvo'] = "exito :D"; 	

	
echo json_encode($jsondata); 
?>   