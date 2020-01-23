<?php

include("../conexion.php");

$code = $_POST["code"];
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$date = date("Y-m-d G:i:s");

$result = $conexion->prepare("INSERT INTO usuario(nombre, apellidos, correo, telefono, fecha) VALUES (:name, :lastname, :email, :phone, :_date)");
$result->bindParam(':name', $name);
$result->bindParam(':lastname', $lastname);
$result->bindParam(':email', $email);
$result->bindParam(':phone', $phone);
$result->bindParam(':_date', $date);

if ($result->execute()) {
	$id = $conexion->lastInsertId();

	$result = $conexion->prepare("UPDATE codigo SET usuario_idusuario = :iduser WHERE idcodigo = :code");
	$result->bindParam(':iduser', $id);
	$result->bindParam(':code', $code);

	$result->execute();
}else {
	echo "No se realizó con éxito la consulta";
}

?>