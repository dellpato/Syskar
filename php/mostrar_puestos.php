<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RRHH</title>

<link rel="stylesheet" href="php/css/formato_css.css" type="text/css" /> 
<script src="php/js/jquery-1.8.1.js" type="text/javascript"></script>
<script src="php/js/jquery.easing.1.3.js" type="text/JavaScript"></script>
<script src="php/js/jquery.form.js" type="text/JavaScript"></script>
</head>


<!--==================HTML MODULO Puestos==============================-->

<body>

<div id="divModulomostrarPuestos"> 
<?php
require_once("../class/class.consultas.php");

$oDatosPersona = new Persona;
$oDatosPersona->idd = 1; // probando a extraer uno 
$mostrarpuesto = $oDatosPersona->mostrar_puestos();
    foreach ($mostrarpuesto as $indice) {
        print_r($indice);
    }

  ?> 
</div>

</body>
</html>
