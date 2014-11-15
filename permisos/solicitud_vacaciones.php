<!DOCTYPE html>
<?php
 	
 	require_once("../class/class.permisos.php");
 	require('../fpdf/fpdf.php');
	
	if(isset($_POST["btn_aceptar"])){
		$Consulta = new realizar_consulta;
		$Consulta->codigo = $_POST['txt_codigoempleado'];
		$mostrar_empleado = $Consulta->consulta();
		
		foreach ($mostrar_empleado as $indice) {
			$vnombre = $indice['Nombres'];
			$vapellido = $indice['Apellidos'];
			$vpuesto = $indice['Puesto'];
			$vjefe = $indice['Jefe'];
			$vdepto = $indice['Depto'];
    	}
		
	
	}//Fin del if de busqueda
	if(isset($_POST["btn_guardar"])){
		header("location:guarda_vacaciones.php")
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
							<input type="text" name="txt_puesto" value="<?php echo $puesto; ?>" size=30></td>
					</tr>
					<tr>
						<td colspan=2><label>Jefe Inmediato</label><br>
							<input type="text" name="txt_jefeinmediato" value="<?php echo $jefe; ?>" size=64></td>
					</tr>
					<tr>
						<td><label>D&iacute;a de Permiso</label><br>
							<input type="date" name="txt_fechapermiso"></td>
						<td><label>Tipo de Permiso</label><br>
							<select name="txt_tipopermiso">
								<option name="permiso1">Particular</option>
								<option name="permiso2">Salud</option>
							</select> </td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="btn_guardar" value="Guardar">
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