<?php

include("../conexion.php");
session_start();

if (isset($_SESSION["user"])) {
	header('Location: ../../admin.php');
}else {
	if (isset($_POST["user"]) && isset($_POST["pass"])) {
		$pass = sha1($_POST["pass"]);

		$result = $conexion->prepare("SELECT * FROM admin WHERE username = :U AND password = :P");
		$result->bindParam(":U", $_POST["user"]);
		$result->bindParam(":P", $pass);

		$result->execute();

		if ($result->rowCount() > 0) {
			$_SESSION["user"] = $_POST["user"];
			$_SESSION["pass"] = $_POST["pass"];

			echo "<script> location.href = 'admin.php'; </script>";
		}else {
			echo "No se ha encontrado el usuario";
		}
	}else {
		header('Location: ../../admin.php');
	}
}

?>