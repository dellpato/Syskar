<?php
	include("conexion.php");
	$link=Conectarse();


$nombres=$_POST['nombre'];
$apellidoa=$_POST['apellido1'];
$apellidob=$_POST['apellido2'];


mysql_query("insert into empleado(nombre, apellido1, apellido2) values('$nombres', '$apellidoa', '$apellidob')", $link);
			

$jsondata['devuelvo'] = "exito :D"; 	

	
echo json_encode($jsondata); 



//METODO PARA DEVOLVER ARRAYS:
//$sql = mysql_query("SELECT p.nombre, p.apellido1, p.apellido2 FROM paciente p HERE p.nombre='carlos'", $link);

//	$row = mysql_fetch_object($sql);
//	$jsondata['nombre'] = $row->nombre; 
//    $jsondata['apellido1'] = $row->apellido1; 
//    $jsondata['apellido2'] = $row->apellido2; 
 
//echo json_encode($jsondata); 

?>   