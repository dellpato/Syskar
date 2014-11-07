<?php
include("conexion.php");
$link=Conectarse();

$politica=$_POST['nueva_politica'];
$descripcion=$_POST['descripcion_nueva_politica'];

mysql_query("insert into politica_relacion_laboral(politica,descripcion) 
	values('$politica','$descripcion')", $link);

echo $politica; 
mysql_close($link); 
?>