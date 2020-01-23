<?php
include("../conexion.php");

$code = $_POST["code"];

if ($code != "") {
	$result = $conexion->prepare("SELECT * FROM codigo WHERE idcodigo = :idC");
	$result->bindParam(':idC', $code);

	$result->execute();

	if ($result->rowCount() > 0) {
		$fetch = $result->fetch(PDO::FETCH_ASSOC);

		if (is_null($fetch["usuario_idusuario"])) {
			echo "true";
		}else {
			echo "false";
		}
	}else {
		echo "false";
	}
}else {
	echo "false";
}

?>