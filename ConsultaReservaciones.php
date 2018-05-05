<link href="css/estilo.css" rel="stylesheet">
<h1> Reservaciones </h1>

<table >
  <thead>
    <tr>
      <th># de Reservación</th>
      <th># de Habitación</th>
      <th>Cliente</th>
      <th>Fecha de Entrada</th>
      <th># de Personas X Habitación</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
<?php
include 'conectaDB.php';
$consulta = "SELECT r.folio, r.idhabitacion, ha.Nombre, r.idhuesped, he.NombreC, r.fecha_entrada, r.fecha_salida, r.pXh FROM registro r, huespedes he, habitaciones ha WHERE r.idhabitacion = ha.idhabitacion and r.idhuesped = he.idhuesped";
if ($resultado = mysqli_query($con, $consulta)) {
    while ($fila = mysqli_fetch_row($resultado)) {
      $folio = '<center>'.$fila[0].'</center>';
      $IdHabitacion = '<center>'.$fila[1].'</center>';
      $NombreHabitacion = '<center>'.$fila[2].'</center>';
      $IdHuesped = '<center>'.$fila[3].'</center>';
      $NombreHuesped = '<center>'.$fila[4].'</center>';
      $FecEntrada = '<center>'.$fila[5].'</center>';
      $FecSalida = '<center>'.$fila[6].'</center>';
      $perXhab = '<center>'.$fila[7].'</center>';
    echo "<tr><td>".$folio."</td><td>".$NombreHabitacion."</td><td>".$NombreHuesped."</td><td>".$FecEntrada."</td><td>".$perXhab."</td><td><form action='Salida.php'><button type='submit'>Dar Salida</button></form></td></tr>";
    }
}
?>
  </tbody>
</table>
<br>
<br>
<br>
<form action="insertaHuesped.php" method="get">
<h1> Registro de Huespedes </h1>

<div >
  <label for="NombreC">Nombre Completo</label>
  <div>
  <input id="NombreC" name="NombreC" type="text" placeholder="Nombre Completo">
  </div>
</div>
<div>
    <label for="telefono">Teléfono</label>
  <div>
  <input id="telefono" name="telefono" type="text" placeholder="Télefono">
  </div>
</div>

<div>
  <label for="habitacion">Estatus</label>
  <div>
    <select id="habitacion" name="habitacion">
      <option value="">Seleccione una Habitación</option>
      <?php
      $consulta = "SELECT idhabitacion, Nombre, num_pers FROM habitaciones WHERE estatus =1";
      if ($resultado = mysqli_query($con, $consulta)) {
          while ($fila = mysqli_fetch_row($resultado)) {
            $idhabitacion = $fila[0];
            $Nombre = $fila[1];
            $num_pers = $fila[2];
            $desc = "Habitación para ".$num_pers." personas, ".$Nombre;

          echo "<option value='".$idhabitacion."'>".$desc."</option>";
          }
      }

       ?>

    </select>
  </div>
</div>
<div>
   <button id="guardar" type="submit">Guardar</button>
 </div>
</form>
