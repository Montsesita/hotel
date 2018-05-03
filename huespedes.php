<h1> Registro de Huespedes </h1>
<table class="table table-striped" border="1">
  <thead>
    <tr>
      <th>Nombre Completo</th>
      <th>Teléfono</th>
      <th>Estatus</th>
    </tr>
  </thead>
  <tbody>
<?php
include 'conectaDB.php';
$consulta = "SELECT idhuesped, NombreC, telefono, estatus FROM huespedes";
if ($resultado = mysqli_query($con, $consulta)) {
    while ($fila = mysqli_fetch_row($resultado)) {
      $IdHuesped = $fila[0];
      $NombreC = $fila[1];
      $telefono = $fila[2];
      $estatus = $fila[3];
      echo "<tr><td>".$NombreC."</td><td>".$telefono."</td><td>".$estatus."</td></tr>";
    }
}
?>
  </tbody>
</table>
<br>
<br>
<br>
<form action="insertaHuesped.php" method="get">


<!-- Form Name -->
<h1> Alta de Huespedes </h1>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="NombreC">Nombre Completo</label>
  <div class="col-md-4">
  <input id="NombreC" name="NombreC" type="text" placeholder="Nombre Completo" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-4 control-label" for="telefono">Teléfono</label>
  <div class="col-md-4">
  <input id="telefono" name="telefono" type="text" placeholder="Télefono" class="form-control input-md">

  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="estatus">Estatus</label>
  <div class="col-md-4">
    <select id="estatus" name="estatus" class="form-control">
      <option value="1">Activo</option>
      <option value="2">Inactivo</option>
    </select>
  </div>
</div>
<div class="col-md-4">
   <button id="guardar" type="submit" class="btn btn-primary">Guardar</button>
 </div>

</form>
