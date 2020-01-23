<?php

include("Php/conexion.php");
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Css/estilos.css">
	<link rel="icon" type="image/png" href="https://www.pumaenergy.com/favicon.ico">
	<title id="textTitle">Puma</title>
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
						if (!isset($_SESSION["user"])) {
					?>
						<h4>Acceder</h4>
						<br>
						<input type="text" id="user" autofocus placeholder="Usuario">
						<br><br>
						<input type="password" id="pass" placeholder="Contraseña">
						<br><br>
						<span id="error_code_login" class="error"></span>
						<button class="btn" id="btn_login">Acceder</button>
					<?php
						}else {
					?>
						<form action="Php/Select/winner.php" method="post">
							<select id="select_pais" name="select_pais" class="btn">
								<option disabled selected>País</option>
								<?php
									$result = $conexion->prepare("SELECT * FROM pais ORDER BY nombre ASC");
									if ($result->execute()) {
										if ($result->rowCount() > 0) {
											while ($fetch = $result->fetch(PDO::FETCH_ASSOC)) {
												echo "<option value='".$fetch["idpais"]."'>".$fetch["nombre"]."</option>";
											}
										}else {
											echo "<option>No hay países registrados</option>";	
										}
									}else {
										echo "<option>Error</option>";
									}
								?>
							</select>
							<a href=""><button type="submit" class="btn" id="btn_sortear" disabled>Sortear</button></a>
						</form>

						<form method="post" class="form" action="Php/Select/reports.php?estado=0">
							<input type="date" name="date_1" class="date_report">
							<br>
							<input type="date" name="date_2" class="date_report">
							<br>
							<button type="submit" class="btn" id="btn_report_users">Descargar informe usuarios</button>
						</form>

						<br><br>

						<form method="post" class="form" action="Php/Select/reports.php?estado=1">
							<input type="date" name="date_1" class="date_report">
							<br>
							<input type="date" name="date_2" class="date_report">
							<br>
							<button class="btn" id="btn_informe">Descargar informe de ganadores</button>
						</form>
						<br><br><br>
						<a href="Php/logout.php"><button class="btn" id="btn_logout">Cerrar sesión</button></a>
						<br><br>
						<span id="error_code_admin" class="error"></span>
					<?php
						}
					?>
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

	<script src="Js/jquery.js"></script>
	<script	src="Js/index.js"></script>
</html>