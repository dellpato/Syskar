<?php
	include("conexion.php");
	$link=Conectarse();

//------------------------------
$idempleado=$_POST['codigo_empleado'];
$fecha_creacion=date("Y-m-d H:i:s");

			$sql = mysql_query("insert into acta_falta(id_empleado, fecha_citacion)
						values('$idempleado', '$fecha_creacion')", $link);		

			
   			//recibo el último id
			$obtengoCreado=0;
			$obtengoCreado=mysql_insert_id($link);

			echo $obtengoCreado; 	

mysql_close($link); 
?>   