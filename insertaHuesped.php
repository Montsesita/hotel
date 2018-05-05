<?php
include 'conectaDB.php';
$nombre = $_GET['NombreC'];
$tel = $_GET['telefono'];
$IdHabitacion = $_GET['habitacion'];
$insertHuesped = "INSERT INTO `huespedes` (`NombreC`, `telefono`, `estatus`) VALUES ('".$nombre."', '".$tel."', '1')";
$con->query($insertHuesped);

$consulta = "SELECT last_insert_id()";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_row($resultado);
$IdHuesped = $fila[0];
$fecha = date("aaaa-mm-dd hh:mm:ss");

$insertHuesped = "INSERT INTO registro` (`idhabitacion`, `idhuesped`, `fecha_entrada`, `pXh`) VALUES ('".$IdHabitacion."', '".$IdHuesped."', '".$fecha."', '1')";
$con->query($insertHuesped);
echo "<script>alert('Se añadió exitosamente la Reservación.');</script>";

header('Location: ConsultaReservaciones.php');
 ?>
