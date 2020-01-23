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
					<h4>Registra tu código</h4>
					<br>
					<input type="text" id="code" autofocus>
					<br><br>
					<span id="error_code" class="error"></span>
					<br>
					<button class="btn" id="btn_next">Siguiente</button>
				</div>

				<div id="container_form_2">
					<h4>Registra tus datos</h4>
					<form action="Php/Insert/user2.php" method="post" id="subForm">
						<br>
						<input type="hidden" name="code_send" id="code_send">
						<input aria-label="Name" id="fieldName" maxLength="200" name="cm-name" required class="sc-iwsKbI iMsgpL" placeholder="Nombre" />
						<br>
						<input aria-label="Apellido" id="fieldyuhdyky" maxLength="200" name="cm-f-yuhdyky" required class="sc-iwsKbI iMsgpL" placeholder="Apellidos" />
						<br>
						<input autoComplete="Email" aria-label="Email" id="fieldEmail" maxLength="200" name="cm-guiudj-guiudj" required type="email" class="js-cm-email-input sc-iwsKbI iMsgpL" placeholder="Correo electrónico" />
						<br>
						<input aria-label="Confirma Correo Electrónico" id="fieldyuhdykj" maxLength="200" name="cm-f-yuhdykj" required class="sc-iwsKbI iMsgpL" placeholder="Confirmar correo electrónico" />
						<br>
						<input aria-label="Número de Teléfono" id="fieldyuhdykt" maxLength="200" name="cm-f-yuhdykt" required type="text" class="sc-iwsKbI iMsgpL" placeholder="Número de teléfono" />
						<br>
						<div>
							<div>
								<div class="sc-bwzfXH ebeRtN">
									<input aria-required id="cm-privacy-consent" name="cm-privacy-consent" required type="checkbox" class="sc-bZQynM eKOoKL" />
									<label size="0.875rem" color="#434d5d" for="cm-privacy-consent" class="sc-bxivhb iHsWXX">Acepto Términos y Condiciones</label>
								</div>
							</div>
							<input id="cm-privacy-consent-hidden" name="cm-privacy-consent-hidden" type="hidden" value="true" />
						</div>
						<br>
						<span id="error_form_info" class="error"></span>
						<button type="button" class="btn" id="btn_register">Registrar</button>
						<br><br>
						<div>
							Este registro es de Puma Energy. Cookies y tecnologías <br> relacionadas son utilizadas con propósitos de publicidad. <br> Para más detalles, visita AdChoices y nuestra <br> política de privacidad. 
						</div>
						<br><br><br>
					</form>
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
	<script src="Js/index.js"></script>

	<!-- data-id="2BE4EF332AA2E32596E38B640E90561996817C14C2EA8D40302791317F4A527E8C2B84CB7CC760B436602A5D2FB19DD458391BEBAC08B0618DB3F861907ABC0A" -->
</body>
</html>