<?php
include 'conectaDB.php';
$nombre = $_GET['NombreC'];
$tel = $_GET['telefono'];
$est = $_GET['estatus'];
$insertHuesped = "INSERT INTO `huespedes` (`NombreC`, `telefono`, `estatus`) VALUES ('".$nombre."', '".$tel."', '".$est."')";
//echo $insertHuesped;
$con->query($insertHuesped);

echo "El Huesped se a agregado exitosamente a la Base de Datos";

header('Location: huespedes.php');
 ?>
