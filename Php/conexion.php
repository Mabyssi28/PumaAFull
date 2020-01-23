<?php

	try {
		$conexion = new PDO ("mysql:host=localhost;dbname=pumaafull",'root', '');
	}
	catch(PDOExepcion $e) {
			echo "Error en la conexión, " . $e->getMassage();
	}

?>