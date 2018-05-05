<link href="css/estilo.css" rel="stylesheet">
<h1> Promociones Activas </h1>

<table >
  <thead>
    <tr>
      <th>Descripción</th>
      <th>Promoción</th>
      <th>Huesped</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
<?php
include 'conectaDB.php';
$consulta = "SELECT p.idpromocion, p.Desc_promo, p.promo,h.NombreC FROM promociones p, huespedes h where p.estatus =1 and p.idhuesped = h.idhuesped";
if ($resultado = mysqli_query($con, $consulta)) {
    while ($fila = mysqli_fetch_row($resultado)) {
      $idpromocion = $fila[0];
      $Desc_promo = $fila[1];
      $promo = $fila[2];
      $IdHuesped = $fila[3];
    echo "<tr><td>".$Desc_promo."</td><td>".$promo."</td><td>".$IdHuesped."</td><td><a href='cupon.php?IdPromo=".$idpromocion."' type='button'>Canjear Cupón</a></td></tr>";
    }
}
?>
  </tbody>
</table>
<hr>
<br>
<h1> Promociones Canjeadas</h1>

<table >
  <thead>
    <tr>
      <th>Descripción</th>
      <th>Promoción</th>
      <th>Huesped</th>

    </tr>
  </thead>
  <tbody>
<?php
include 'conectaDB.php';
$consulta = "SELECT p.idpromocion, p.Desc_promo, p.promo,h.NombreC FROM promociones p, huespedes h where p.estatus =2 and p.idhuesped = h.idhuesped";
if ($resultado = mysqli_query($con, $consulta)) {
    while ($fila = mysqli_fetch_row($resultado)) {
      $idpromocion = $fila[0];
      $Desc_promo = $fila[1];
      $promo = $fila[2];
      $IdHuesped = $fila[3];
    echo "<tr><td>".$Desc_promo."</td><td>".$promo."</td><td>".$IdHuesped."</td></tr>";
    }
}
?>
  </tbody>
</table>


<br>
<hr>

<form action="insertaPromo.php" method="post">
<h1>Alta de Promociones</h1>
<hr>
<div>
    <label for="DescripcionP">Descripción de la Promoción</label>
  <div>
  <input id="DescripcionP" name="DescripcionP" type="text" placeholder="Descripcion de la Promoción" required>
  </div>
</div>
<div>
    <label for="Promo">Promoción</label>
  <div>
  <input id="Promo" name="Promo" type="text" placeholder="Promoción" required>
  </div>
</div>

<div>
  <label for="user">Huesped</label>
  <div>
    <select id="user" name="user">
      <option value="">Seleccione un Huesped</option>
      <?php
      include 'conectaDB.php';
      $consulta = "SELECT idhuesped, NombreC from huespedes";
      if ($resultado = mysqli_query($con, $consulta)) {
          while ($fila = mysqli_fetch_row($resultado)) {
            $idhuesped = $fila[0];
            $NombreC = $fila[1];
            echo "<option value='".$idhuesped."'>".$NombreC."</option>";
          }
      }

       ?>

    </select>
  </div>
</div>
<div>
   <button id="guardar" type="submit">Agregar Promo a Usuario</button>
 </div>
</form>
