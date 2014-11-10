<!DOCTYPE html>
<html>
<head>
	<title>Solicitud Permiso</title>
</head>
<body>
	<header><h2>Ingreso de Solicitud de Permiso</h2></header>
	<nav>
		<div id="solicitudpermiso">
			<form name="frm_solicitud_permiso" method="post" action="guarda_solicitud_permiso.php">
				<table>
					<tr>
						<td align="right">
							<label>C&oacute;digo de Empleado</label>
						</td>
						<td>
							<form name="frm_busqueda_empleado_permiso" method="post" action="busqueda_permiso.php">
								<input type="text" name="txt_codigoempleado"> 
								<input type="submit" name="btn_buscar" value="Buscar"><br>
							</form>
						</td>
					</tr>
					<tr>
						<td><label>Nombres</label><br>
							<input type= "text" name="txt_nombres" size=30></td>
						<td><label>Apellidos</label><br>
							<input type= "text" name="txt_apellidos" size=30></td>
					</tr>
					<tr>
						<td><label>Departamento Area</label><br>
							<input type="text" name="txt_departamento" size=30></td>
						<td><label>Cargo o Puesto</label><br>
							<input type="text" name="txt_puesto" size=30></td>
					</tr>
					<tr>
						<td colspan=2><label>Jefe Inmediato</label><br>
							<input type="text" name="txt_jefeinmediato" size=64></td>
					</tr>
					<tr>
						<td><label>D&iacute;a de Permiso</label><br>
							<input type="date" name="txt_fechapermiso"></td>
						<td><label>Tipo de Permiso</label><br>
							<select name="txt_tipopermiso">
								<option name="permiso1">Particular</option>
								<option name="permiso1">Salud</option>
							</select> </td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="Guardar">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</nav>
	<footer></footer>
</body>
</html>