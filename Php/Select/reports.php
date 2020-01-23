<?php

include("../conexion.php");
session_start();

if (isset($_SESSION["user"])) {
	$date_1 = $_POST["date_1"] . " 00:00:00";
	$date_2 = $_POST["date_2"] . " 23:59:59";

	$salida=fopen('php://output', 'w');
	fprintf($salida, chr(0xEF).chr(0xBB).chr(0xBF));

	if ($_GET["estado"] == 0) {
		//Reporte de usuarios
		$result = $conexion->prepare("SELECT * FROM usuario WHERE fecha BETWEEN :date_1  AND :date_2 ORDER BY idusuario ASC");
		$result->bindParam(":date_1", $date_1 );
		$result->bindParam(":date_2", $date_2 );
		$result->execute();

		if ($result->rowCount() > 0) {
			header('Content-Type:text/csv;');
			header('Content-Disposition: attachment; filename="Reporte de usuarios.csv"');

			fputcsv($salida, array('Identificación', 'Nombre', 'Apellidos', 'Correo', 'Teléfono', 'Fecha de registro'), ";");
			while ($fetch = $result->fetch(PDO::FETCH_ASSOC))  {
				fputcsv($salida, array($fetch['idusuario'], $fetch['nombre'], $fetch['apellidos'], $fetch['correo'], $fetch['telefono'], $fetch['fecha']), ";");
			}
		}else {
			echo "<script> setTimeout(alert('No se encontró registros entre esas fechas'), 1); location.href = '../../admin.php'; </script>";
		}
	}else if ($_GET["estado"] == 1) {
		//Reporte de ganadores
		$result = $conexion->prepare("SELECT u.idusuario, u.nombre AS name_u, u.apellidos, c.idcodigo, p.nombre, c.fecha_sorteo FROM codigo c INNER JOIN usuario u ON u.idusuario = c.usuario_idusuario INNER JOIN pais p ON p.idpais = c.pais_idpais WHERE fecha BETWEEN :date_1  AND :date_2 AND c.estado = 1 ORDER BY idusuario ASC");
		$result->bindParam(":date_1", $date_1 );
		$result->bindParam(":date_2", $date_2 );
		$result->execute();

		if ($result->rowCount() > 0) {
			header('Content-Type:text/csv;');
			header('Content-Disposition: attachment; filename="Reporte de ganadores.csv"');

			fputcsv($salida, array('Identificación', 'Nombre', 'Apellidos', 'Código', 'País', 'Fecha sorteo'), ";");
			while ($fetch = $result->fetch(PDO::FETCH_ASSOC))  {
				fputcsv($salida, array($fetch["idusuario"], $fetch["name_u"], $fetch["apellidos"], $fetch["idcodigo"], $fetch["nombre"], $fetch["fecha_sorteo"]), ";");
			}
		}else {
			echo "<script> setTimeout(alert('No se encontró registros entre esas fechas'), 1); location.href = '../../admin.php'; </script>";
		}
	}else {
		header('Location: ../../admin.php');
	}
}else {
	header('Location: ../../admin.php');
}

?>