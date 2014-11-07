<?php
	include("conexion.php");
	$link=Conectarse();

//------------------------------
$form_nombre_dpto=$_POST['form_nombre_dpto'];
$form_descripcion_dpto=$_POST['form_descripcion_dpto'];
$form_jefe_inmediato_dpto=$_POST['form_jefe_inmediato_dpto'];
$form_puestos_dpto=$_POST['form_puestos_dpto'];



$sql = mysql_query("insert into departamento_area(nombre_departamento, descripcion, jefe_inmediato, no_maximo_puestos)
	values('$form_nombre_dpto', '$form_descripcion_dpto', '$form_jefe_inmediato_dpto', '$form_puestos_dpto')", $link);		

		

//recibo el último id
			$obtengoCreado=0;
			$obtengoCreado=mysql_insert_id($link);

			echo $obtengoCreado; 	

mysql_close($link); 
?>