<!DOCTYPE html>
<?php
 	
 	require_once("../class/class.permisos.php");
 	//require('../fpdf/fpdf.php');
	$hoy = getdate();
	$dia = $hoy['mday'];
	$mes = $hoy['mon'];
	$annio = $hoy['year'];
	
	$nombre = "";
	$apellido = "";
	$jefe = "";
	$puesto = "";
	$depto = "";
	
	if(isset($_POST["btn_aceptar"])){
		$Consulta = new realizar_consulta;
		$Consulta->codigo = $_POST['txt_codigoempleado'];
		$mostrar_empleado = $Consulta->consulta();
		
		foreach ($mostrar_empleado as $indice) {
			$nombre = $indice['Nombres'];
			$apellido = $indice['Apellidos'];
			$puesto = $indice['Puesto'];
			$jefe = $indice['Jefe'];
			$depto = $indice['Depto'];
			
		}
	}//Fin del if de busqueda
	if(isset($_POST["btn_guardar"])){
		header("location:guarda_vacaciones.php");
	}
	
	if(isset($_POST["btn_buscar"])){
		
		echo "Esta Buscando";
	}
?>
<html>
<head>
	<title>Solicitud Vacaciones</title>
</head>
<body>
	<header><h2>Ingreso de Solicitud de Vacaciones</h2></header>
	<nav>
		<div id="solicitud_permiso">
			<form name="frm_solicitud_permiso" method="post" action="solicitud_vacaciones.php">
				<table>
					<tr>
						<td align="right">
							<label>C&oacute;digo de Empleado</label>
						</td>
						<td>
							<input type="text" name="txt_codigoempleado" size="10"> 
							<input type="submit" name="btn_aceptar" value="Aceptar">
							<input type="submit" name="btn_buscar" value="Buscar">
						</td>
					</tr>
					<tr>
						<td>
							<br><br>
						</td>	
					</tr>
					<tr>
						<td><label>Nombres</label><br>
							<input type= "text" name="txt_nombres" value="<?php echo $nombre; ?>" size=30></td>
						<td><label>Apellidos</label><br>
							<input type= "text" name="txt_apellidos" value="<?php echo $apellido;  ?>" size=30></td>
					</tr>
					<tr>
						<td><label>Departamento Area</label><br>
							<input type="text" name="txt_departamento" value="<?php echo $depto; ?>" size=30></td>
						<td><label>Cargo o Puesto</label><br>
							<input type="htext" name="txt_puesto" value="<?php echo $puesto; ?>" size=30></td>
					</tr>
					<tr>
						<td colspan=2><label>Jefe Inmediato</label><br>
							<input type="text" name="txt_jefeinmediato" value="<?php echo $jefe; ?>" size=64></td>
					</tr>
					<tr>
						<td><label>Fecha</label><br>
							<input type="text" name="txt_fechapermiso" value="<?php echo "$dia/$mes/$annio"; ?>"></td>
					</tr>
					<tr>
						<td><input type="submit" name="btn_guardar" value="Guardar">
						<td></td>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</nav>
	<?php 
		
	?>
	<footer></footer>
</body>
</html>