<?php

if(!empty($_GET['q'])) {
search();
} 

function search() {
include("conexion.php");
$link=Conectarse();

$q = mysql_real_escape_string($_GET['q']);
$sql = mysql_query("SELECT p.id_politica, p.politica, p.descripcion FROM politica_relacion_laboral p WHERE p.politica LIKE '%{$q}%'", $link);
//Create an array with the results
$results=array();
while($v = mysql_fetch_object($sql)){
$results[] = array(
'id_politica'=>$v->id_politica,
'politica'=>$v->politica,
'descripcion'=>$v->descripcion
);
}

echo json_encode($results);

}

?>