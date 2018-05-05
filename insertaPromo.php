<?php
include 'conectaDB.php';
$DescPromo = $_POST['DescripcionP'];
$Promoc = $_POST['Promo'];
$usuario = $_POST['user'];
$insertUsu = "INSERT INTO `promociones` (`Desc_promo`, `promo`, `idhuesped`, `estatus`) VALUES ('".$DescPromo."', '".$Promoc."', '".$usuario."', '1');";
//echo $insertUsu;
$con->query($insertUsu);
echo "<script>alert('Se añadió exitosamente la promoción al Usuario.');</script>";

header('Location: promociones.php');
 ?>
