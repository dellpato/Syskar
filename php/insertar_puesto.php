<?php
require_once("../class/class.consultas.php");

$oDatosPersona = new Persona;
$oDatosPersona->idd = mysql_real_escape_string($_POST['id']);
$oDatosPersona->puesto = mysql_real_escape_string($_POST['nombre']);
$oDatosPersona->descripcion = mysql_real_escape_string($_POST['desc']);

$oDatosPersona->inserta_datos();
header("location:../ingreso_puesto.html");
?>
