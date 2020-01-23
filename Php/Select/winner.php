<?php

include("../conexion.php");
session_start();

$date = date("Y-m-d G:i:s");

if (isset($_SESSION["user"]) && isset($_POST["select_pais"])) {
	$result = $conexion->prepare("SELECT * FROM codigo WHERE pais_idpais = :idP AND usuario_idusuario <> '' AND estado = 0 ORDER BY RAND() LIMIT 1");
	$result->bindParam(":idP", $_POST["select_pais"]);

	if ($result->execute()) {
		if ($result->rowCount() > 0) {
			$fetch = $result->fetch(PDO::FETCH_ASSOC);

			$result = $conexion->prepare("UPDATE codigo SET estado = 1, fecha_sorteo = :date_s WHERE idcodigo = :idC");
			$result->bindParam(":idC", $fetch["idcodigo"]);
			$result->bindParam(":date_s", $date);

			$result->execute();
			echo "<script> setTimeout(alert('Ganador: ".$fetch["usuario_idusuario"].", con el código: ".$fetch["idcodigo"]."'), 1); location.href = '../../admin.php'; </script>";
		}else {
			echo "<script> setTimeout(alert('No hay códigos disponibles para ese país'), 1); location.href = '../../admin.php'; </script>";
		}
	}
}else {
	header('Location: ../../admin.php');
}

?>