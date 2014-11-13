<?php
require_once("../class/class.consultas.php");
include("numeros_a_letras.php");

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

$dia = convertir(date('d'));
$año = convertir(date('Y'));

$fecha = $dia." "."(".date('d').")"." de ".$meses[date('n')-1]. " del ".$año." "."(".date('Y').")." ;

$fecha2= date('Y/m/d'); //almacenar en la base de datos;

$oDatosPersona = new Persona;
$oDatosPersona->dato = mysql_real_escape_string($_POST['nombre']);
$mostrardatos = $oDatosPersona->mostrar_datos_contratos();

if($oDatosPersona->dato == ""){
	echo "Debe de ingresar un Nombre o Apellido";
}
else{ ?>
<form action="php/crear_contrato.php" method="post">
<table width="518" border=0>

  <?php foreach($mostrardatos as $row){ $var= convertir($row['Edad']);	?>
  <tr>
    <td>Fecha Actual:</td>
    <th colspan="3" align="justify" style="font-weight: bold"><?php echo $fecha;?></th>
  </tr>
  <tr>
    <td width="130">Nombre y apellido:</td>
    <th colspan="3" align="justify" style="font-weight: bold"><?php echo $row['Datos'];?></th>
  </tr>
  <tr>
    <td>Edad:</td>
    <td width="134" style="font-weight: bold"><?php echo $var." años"; ?></td>
    <td width="93">Estado Civil:</td>
    <td width="143" style="font-weight: bold"><?php echo $row['estado']; ?></td>
  </tr>
  <tr>
    <td>Dirección:</td>
    <th colspan="3" align="left" style="font-weight: bold"><?php echo $row['direccion']; ?></th>
  </tr>
  <tr>
    <td>Nacionalidad:</td>
    <td style="font-weight: bold"><?php echo $row['Nacionalidad']; ?></td>
    <td>DPI:</td>
    <td style="font-weight: bold"><?php echo $row['documento']; ?></td>
  </tr>
  <tr>
    <td>Extendido:</td>
    <th colspan="3" align="left" style="font-weight: bold"><?php echo $row['extendido']; ?></th>
  </tr>
  <tr>
    <td>Renglon:</td>
    <th colspan="3" align="left" style="font-weight: bold"><select name = "renglon" id = "renglon">
    <option>022</option>
    <option>031</option>
    </select></th>
  </tr>
  <tr>
    <td>Horario:</td>
    <th colspan="3" align="left" style="font-weight: bold"><select name = "horario" id = "horario">
    <option>7:30 a.m. a 04:00 p.m.</option>
    <option>8:00 a.m. a 04:30 p.m.</option>
    </select></th>
  </tr>
  <tr>
    <td></td>
    <th colspan="3" align="left" style="font-weight: bold"></th>
  </tr>
  <tr>
    <th height="45" colspan="2"><input type="submit" target = "_blank" value="Confirmar Empleado"></th>
    <th colspan="2"><input type="button" onClick = "window.location ='asignar_contrato.html' "value = "Regresar" ></th>
  </tr>
  <?php } ?>

</table>
</form>
	
	<?php } 
	
     /*$tabla.="<tr>" ;
    $tabla.="<td>".$row['id_empleado']."</td>";
    $tabla.="<td>".$row['Datos']."</td>";
    $tabla.="<td>".$row['Edad']."</td>";
	$tabla.="<td>".$row['estado']."</td>";
	$tabla.="<td>".$row['Nacionalidad']."</td>";
	$tabla.="<td>".$row['direccion']."</td>";
	$tabla.="<td>".$row['documento']."</td>";
	$tabla.="<td>".$row['extendido']."</td>";
    $tabla.="</tr>" ;*/


?>
