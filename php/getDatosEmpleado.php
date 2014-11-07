<?php
$id=$_GET['id'];


	include("conexion.php");
	$link=Conectarse();

$sql = mysql_query("SELECT e.nombre_completo, e.primer_apellido, e.segundo_apellido, e.fecha_nacimiento, e.direccion, e.nit, e.email, e.nacionalidad, e.telefono_celular, e.no_afiliacion_igss, e.sexo, e.telefono_casa, e.telefono_oficina FROM empleado e WHERE e.id_empleado=$id", $link);


	$row = mysql_fetch_object($sql);
	$jsondata['nombre_completo'] = $row->nombre_completo; 
    $jsondata['primer_apellido'] = $row->primer_apellido; 
    $jsondata['segundo_apellido'] = $row->segundo_apellido; 
	$jsondata['fecha_nacimiento'] = $row->fecha_nacimiento; 
	$jsondata['direccion'] = $row->direccion; 
	$jsondata['email'] = $row->email; 
	$jsondata['nit'] = $row->nit; 
	$jsondata['nacionalidad'] = $row->nacionalidad; 
	$jsondata['telefono_celular'] = $row->telefono_celular; 
	$jsondata['no_afiliacion_igss'] = $row->no_afiliacion_igss; 
	$jsondata['sexo'] = $row->sexo; 
	$jsondata['telefono_casa'] = $row->telefono_casa; 
	$jsondata['telefono_oficina'] = $row->telefono_oficina; 
	
 
    echo json_encode($jsondata); 
    
	
mysql_close($link); 
	
	
?>