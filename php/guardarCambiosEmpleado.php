<?php
	include("conexion.php");
	$link=Conectarse();

//------------------------------
$codigo=$_POST['codigo_empleado_sistema_form'];
$nombre_completo=$_POST['nombre_empleado_form'];
$primer_apellido=$_POST['primer_apellido_form'];
$segundo_apellido=$_POST['segundo_apellido_form'];
$fecha_nacimiento=$_POST['fecha_nac_form'];
$direccion=$_POST['direccion_form'];
$email=$_POST['email_empleado_form'];
$nit=$_POST['nit_empleado_form'];
$nacionalidad=$_POST['nacionalidad_form'];
$telefono_celular=$_POST['telefono_celular_form'];
$no_afiliacion_igss=$_POST['no_afiliacion_igss_form'];
$sexo=$_POST['genero_empleado_form'];
$telefono_casa=$_POST['telefono_casa_form'];
$telefono_oficina=$_POST['telefono_oficina_form'];


			$sql = mysql_query("UPDATE empleado SET  no_afiliacion_igss='$no_afiliacion_igss', primer_apellido='$primer_apellido',  segundo_apellido='$segundo_apellido', nombre_completo='$nombre_completo', fecha_nacimiento='$fecha_nacimiento', nit='$nit', sexo='$sexo', email='$email', telefono_casa='$telefono_casa', telefono_celular='$telefono_celular', telefono_oficina='$telefono_oficina', direccion='$direccion', nacionalidad='$nacionalidad' WHERE id_empleado=$codigo", $link);		

		

echo 'Ok'; 	

mysql_close($link); 
?>