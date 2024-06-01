<?php
require_once('./db.php');
$db = conexion();
$res = mysqli_query($db, 'SELECT * FROM EVENTOS');

$id = $_GET['id'] ?? '';


if ($_POST) {
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $matricula = $_POST['matricula'];
  $semestre = $_POST['semestre'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $evento = $_POST['evento'];
  $carrera = $_POST['carrera'];
  $consulta = mysqli_query($db, "UPDATE alumnos SET nombre = '$nombre', matricula = '$matricula', 
    semestre = '$semestre', telefono = '$telefono', correo = '$correo', evento = '$evento', carrera = '$carrera' WHERE id = $id ");
  if ($consulta) {
    header('Location: http://localhost/hackathon/admin.php?msg=Alumno editado correctamente');
    exit;
  }
}


$consulta = mysqli_query($db, "SELECT * FROM alumnos WHERE id = $id");
$alumno = mysqli_fetch_assoc($consulta);

if ($alumno == null) {
  header('Location: http://localhost/hackathon/admin.php');
  exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <form action="editar.php" method="POST" class="col col-5 mx-auto mt-4">

    <div class="elemento">
      <label for="nombre">Nombre</label>
      <input class="form-control" name="nombre" type="text" placeholder="Ingrese su nombre" value="<?= $alumno['nombre'] ?>">
    </div>
    <div class="elemento">
      <label class="form-label" for="matricula">Matricula</label>
      <input class="form-control" name="matricula" type="text" placeholder="Ingrese su matricula" value="<?= $alumno['matricula'] ?>">
    </div>
    <div class="elemento">
      <label for="semestre">Semestre</label>
      <input class="form-control" name="semestre" type="text" placeholder="Ingrese su semestre" value="<?= $alumno['semestre'] ?>">
    </div>
    <div class="elemento">
      <label for="telefono">telefono</label>
      <input class="form-control" name="telefono" type="text" placeholder="Ingrese su telefono" value="<?= $alumno['telefono'] ?>">
    </div>
    <div class="elemento">
      <label for="correo">Correo</label>
      <input class="form-control" name="correo" type="text" placeholder="Ingrese su correo" value="<?= $alumno['correo'] ?>">
    </div>
    <input type="hidden" name="id" value="<?= $id ?>">
    <div>
      <label for="evento">Evento</label>
      <select class="form-control" name="evento">
        <?php while ($item = mysqli_fetch_assoc($res)) : ?>
          <option <?= $alumno['evento'] == $item['id_evento'] ? 'selected' : '' ?> value="<?= $item['id_evento'] ?>"><?= $item['nombre_evento'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="elemento">
      <label for="carrera">Carrera</label>
      <input class="form-control" name="carrera" type="text" placeholder="Ingrese su carrera" value="<?= $alumno['carrera'] ?>">
    </div>
    <div class="elemento">
      <input name="" class="btn btn-primary mt-4" type="submit" value="Editar">
    </div>
  </form>


</body>

</html>