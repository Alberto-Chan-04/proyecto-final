<?php
session_start();
$session = $_SESSION['auth'] ?? false;

if (!$session) {
    header('Location: http://localhost/hackathon/');
    exit;
}

require_once('./db.php');
$db = conexion();
$query = "SELECT * FROM alumnos INNER JOIN eventos ON alumnos.evento = eventos.id_evento";
$items = mysqli_query($db, $query);


$idAlumno = $_GET['id'] ?? '';
$msg = $_GET['msg'] ?? '';

$eliminado = false;

if ($idAlumno) {
    $rquery = "DELETE FROM alumnos WHERE id = $idAlumno";
    $eliminado = mysqli_query($db, $rquery);
    if ($eliminado) {
        $msg = 'Se elimino correctamente';
    }else{
        $msg = 'No se pudo eliminar el alumno';
    }


    header("Location: http://localhost/hackathon/admin.php?msg=$msg");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Administrador</title>
</head>
<script>
    if ('<?= $msg ?>') {
      setTimeout(() => {
        alert('<?php echo $msg; ?>');
        window.location.href = 'http://localhost/hackathon/admin.php'
      }, 600);

    }
  </script>
<body>
    
<header>
<div class="contenedor_header ancho">
      <a href="https://www.gob.mx/" target="_blank"><img class="logogob_header" src="imagenes/logoheader.svg" alt="" /></a>
      <div class="link_header">
        <a href="https://www.gob.mx/gobierno" target="_blank">Gobierno</a>
        <a href="https://www.participa.gob.mx/" target="_blank">Participa</a>
        <a href="https://datos.gob.mx/" target="_blank">Datos</a>
        <?php if($session):?>
            <a href="admin.php" target="_blank">Administrador</a>
        <?php endif;?>
        
          <a href="<?= $session ? 'cerrar.php' : 'http://localhost/hackathon/login.php' ?>"><?php echo $session ? 'Cerrar Sesión' :'Iniciar Sesión' ?></a>
        
      </div>
    </div>
</header>
<!-- DASHBOARD -->
    <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 bg-dark text-white vh-100">
        <h1 class="text-center my-4">Administrador</h1>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Inicio</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Configuracion</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="eventos.php">Eventos</a>
          </li>
        </ul>
      </div>

      <!-- Content -->
      <div class="col-md-9">
        <h2 class="py-4">Alumnos</h2>
      <table class="table table-light ">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Evento</th>
                    <th scope="col">Acciones</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($alumno = mysqli_fetch_assoc($items)):?>
                    <tr>
                        <td><?= $alumno['nombre'] ?></td>
                        <td><?= $alumno['matricula'] ?></td>
                        <td><?= $alumno['correo'] ?></td>
                        <td><?= $alumno['semestre'] ?></td>
                        <td><?= $alumno['carrera'] ?></td>
                        <td><?= $alumno['telefono'] ?></td>
                        <td><?= $alumno['nombre_evento'] ?></td>
                        <td> <a href="http://localhost/hackathon/admin.php?id=<?= $alumno['id']?>">Eliminar</a></td>
                        <td> <a href="http://localhost/hackathon/editar.php?id=<?= $alumno['id']?>">Editar</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    const { pathname } = window.location
    const [ n1,n2 ] = document.querySelectorAll('.nav-link')
    if(pathname === '/hackathon/admin.php')  {
        n1.classList.add('text-white')
    }else{
        n2.classList.add('text-white')
    }
</script>
  </html>