<?php
	include("conexion.php");
	$link=Conectarse();

//------------------------------

			$sql = mysql_query("insert into empleado(municipio) values(0)", $link);		

			
   			//recibo el último id
			$obtengoCreado=0;
			$obtengoCreado=mysql_insert_id($link);

			echo $obtengoCreado; 	

mysql_close($link); 
?>   