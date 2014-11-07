<?php
	include("conexion.php");
	$link=Conectarse();

//------------------------------
$idempleado=$_POST['codigo_empleado'];
$acta_no_sistema=$_POST['acta_no_sistema'];
$fecha_creacion=$_POST['fecha_creacion'];
$acta_no=$_POST['acta_no'];
$citacion_no=$_POST['citacion_no'];
$fecha_citacion=$_POST['fecha_citacion'];
$acuerdo_no=$_POST['acuerdo_no'];
$sancion_acta_falta=$_POST['sancion_acta_falta'];


			$sql = mysql_query("UPDATE acta_falta SET  sancion='$sancion_acta_falta', fecha_acta='$fecha_creacion',  citacion_no='$citacion_no', fecha_citacion='$fecha_citacion', acta_no='$acta_no', acuerdo_no='$acuerdo_no' WHERE id_acta_falta=$acta_no_sistema", $link);		

		

echo 'Ok'; 	

mysql_close($link); 
?>   