<?php
if(!empty($_GET['q'])) {

		search();
	
} 

function search() {
$con = mysql_connect("localhost","root", "entrar");
mysql_select_db("seminario", $con);

$q = mysql_real_escape_string($_GET['q'], $con);
$results=array();


//EMPLEADOS
$sql = mysql_query("SELECT p.id_empleado, p.nombre_completo, p.primer_apellido, p.segundo_apellido FROM empleado p WHERE p.nombre_completo LIKE '%{$q}%' OR p.primer_apellido LIKE '%{$q}%' OR p.segundo_apellido LIKE '%{$q}%' limit 10");
while($v = mysql_fetch_object($sql)){
$results[] = array(
'reciboid'=>$v->id_empleado,
'nombre'=>$v->nombre_completo,
'apellido1'=>$v->primer_apellido,
'apellido2'=>$v->segundo_apellido,
'tipo'=>'1',
);
}

//using JSON to encode the array
echo json_encode($results);
}
?>

