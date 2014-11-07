<?php
$id=$_GET['id'];


	include("conexion.php");
	$link=Conectarse();

$sql = mysql_query("SELECT f.sancion, f.fecha_acta, f.citacion_no, f.fecha_citacion, f.acta_no, f.acuerdo_no FROM acta_falta f WHERE f.id_acta_falta=$id", $link);


	$row = mysql_fetch_object($sql);
	$jsondata['sancion'] = $row->sancion; 
    $jsondata['fecha_acta'] = $row->fecha_acta; 
    $jsondata['citacion_no'] = $row->citacion_no; 
	$jsondata['fecha_citacion'] = $row->fecha_citacion; 
	$jsondata['acta_no'] = $row->acta_no; 
	$jsondata['acuerdo_no'] = $row->acuerdo_no; 
	
 
    echo json_encode($jsondata); 
    
	
mysql_close($link); 
	
	
?>