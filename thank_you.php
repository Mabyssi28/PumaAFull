<?php

include("Php/conexion.php");

$result = $conexion->prepare("SELECT * FROM codigo WHERE idcodigo = :idC");
$result->bindParam(":idC", $_GET["C"]);

if ($result->execute()) {
	$fetch = $result->fetch(PDO::FETCH_ASSOC);

	$id_pais = $fetch["pais_idpais"];

	$result = $conexion->prepare("SELECT * FROM pais WHERE idpais = :idP");
	$result->bindParam(":idP", $id_pais);

	$result->execute();

	$fetch = $result->fetch(PDO::FETCH_ASSOC);

	$bandera = $fetch["bandera"];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Css/estilos.css">
	<link rel="icon" type="image/png" href="https://www.pumaenergy.com/favicon.ico">
	<title id="textTitle">Thank You</title>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154298512-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		
		gtag('config', 'UA-154298512-1');
	</script>
</head>
<body class="body-one">

	<div class="container">
		<div class="column">
			<div id="container_img">
				<img src="Imagenes/Logo.png">
			</div>
		</div>
		<div class="column">
			<center>
				<div id="container_form_1">
					<?php
						if (isset($bandera)) {
							echo "<h4>¡Ya estás participando!</h4><img src='Imagenes/Banderas/".$bandera."' width='400' height='200'>";
						}else {
							echo "<h4>Debe de haber un error... <br> Por favor pulsa el botón <br> para recomenzar el proceso</h4>";
						}
					?>
					<br>
					<br>
					<a href="index.php"><button class="btn" id="btn_return">Registrar otro código</button></a>
				</div>
			</center>
		</div>
		<footer>
			<div>Reglas</div>
			<div>Políticas de Privacidad</div>
			<div>Términos y Condiciones</div>
			<div>© Puma Energy 2020</div>
		</footer>
	</div>
</body>
</html>