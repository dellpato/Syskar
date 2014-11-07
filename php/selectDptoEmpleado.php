<?php
	include("conexion.php");
	$link=Conectarse();

//------------------------------
$global_emp_cod=$_POST['global_emp_cod'];

$dpto=$_GET['dpto'];


			$sql = mysql_query("UPDATE empleado SET id_departamento='$dpto' WHERE id_empleado=$global_emp_cod", $link);		

		

echo 'Ok'; 	

mysql_close($link); 
?>   