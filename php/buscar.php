<?php
require_once("../class/class.consultas.php");
include("numeros_a_letras.php");

$oDatosPersona = new Persona;
$oDatosPersona->dato = mysql_real_escape_string($_POST['nombre']);
$mostrardatos = $oDatosPersona->mostrar_datos_contratos();

if($oDatosPersona->dato == ""){
	echo "Debe de ingresar un Nombre o Apellido";
}
else{ ?>
<table width="518" border=0>

  <?php foreach($mostrardatos as $row){ $var= convertir($row['Edad']);
	echo $var; ?>
  <tr>
    <td width="130">Nombre y apellido:</td>
    <th colspan="3" align="justify" style="font-weight: bold"><?php echo $row['Datos'];?></th>
  </tr>
  <tr>
    <td>Edad:</td>
    <td width="134" style="font-weight: bold"><?php echo $var; ?></td>
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
    <td>Extendido:</td>
    <th colspan="3" align="left" style="font-weight: bold"><?php echo $row['extendido']; ?></th>
  </tr>
  <tr>
    <td></td>
    <th colspan="3" align="left" style="font-weight: bold"></th>
  </tr>
  <tr>
    <th height="45" colspan="2"><input type="submit" value="Confirmar Empleado"></th>
    <th colspan="2"><input type="button" onClick = "window.open('asignar_contrato.html')"value = "Regresar" ></th>
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