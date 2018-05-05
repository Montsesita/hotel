<?php
include 'conectaDB.php';

$Promoc = $_GET['IdPromo'];

$updPromo = "UPDATE `promociones` SET `estatus`='2' WHERE `idpromocion`=".$Promoc;

$con->query($updPromo);
echo "<script>alert('Se cobró exitosamente la promoción al Usuario.');</script>";

header('Location: promociones.php');
 ?>
