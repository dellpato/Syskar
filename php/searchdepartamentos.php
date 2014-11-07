<?php
if(!empty($_GET['q'])) {
search();
} 

function search() {
$con = mysql_connect("localhost","root", "entrar");
mysql_select_db("seminario", $con);

$q = mysql_real_escape_string($_GET['q'], $con);
$sql = mysql_query("SELECT p.id_departamento, p.nombre_departamento FROM departamento_area p WHERE p.nombre_departamento LIKE '%{$q}%'");
//Create an array with the results
$results=array();
while($v = mysql_fetch_object($sql)){
$results[] = array(
'id_departamento'=>$v->id_departamento,
'nombre_departamento'=>$v->nombre_departamento
);
}
//using JSON to encode the array
echo json_encode($results);
}
?>

