<?php
session_start();
$session = $_SESSION['auth'] ?? false;

if (!$session) {
    header('Location: http://localhost/hackathon/');
    exit;
}

require_once('./db.php');
$db = conexion();

$id = $_GET['id'] ?? '';

if ($_POST) {
    $titulo = $_POST['titulo'] ?? '';
    $texto = $_POST['texto'] ?? '';
    $vista = $_POST['vista'] ?? '';
    $idCurrent = $_POST['id'] ?? '';
    $imagen =  '';
    if (isset($_FILES['imagen'])) {
        $imagen = $_FILES['imagen']['name'];
    }
    
    if ($titulo == '' || $texto == '' || $vista == '' ) {
        echo "Llene todos los campos";
    }else{
        
        $ruta = "img/" . $_FILES['imagen']['name'];
        // Movemos el archivo desde el directorio temporal al destino final
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

        $img = $imagen ? $imagen : $_POST['imagenBefore'] ;
        $query = "INSERT INTO eventos(nombre_evento,texto,vista,imagen) VALUES ('$titulo','$texto','$vista','$imagen')";
        $query = "UPDATE eventos SET nombre_evento='$titulo', texto='$texto', vista='$vista', imagen = '$img' WHERE id_evento = $idCurrent";
        mysqli_query($db, $query);
        header('Location: http://localhost/hackathon/eventos.php?msg=se actualizo el evento correctamente');

    }
    
  
}


$queryId = "SELECT * FROM eventos WHERE id_evento = $id";
$res = mysqli_query($db, $queryId);
$evento = mysqli_fetch_assoc($res);


$acciones = [
    [
        'value' => 1,
        'nombre' => 'Activo'
    ],
    [
        'value' => 2,
        'nombre' => 'Desactivado'
    ],
]


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="estilos-eventos.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Administrador</title>
</head>
<script>
    if ('<?= $msg ?>') {
      setTimeout(() => {
        alert('<?php echo $msg; ?>');
        window.location.href = 'http://localhost/hackathon/eventos.php'
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
          <li class="nav-item">
            <a class="nav-link" href="#">Configuracion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="eventos.php">Eventos</a>
          </li>
        </ul>
      </div>

      <!-- Content -->
      <div class="col-md-9">
        <h2 class="py-4">Agregar Eventos</h2>
        <form action="editarEvento.php?id=<?= $evento['id_evento'] ?>" method="POST" enctype="multipart/form-data">
            <div>
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" placeholder="Ingresar titulo" value="<?= $evento['nombre_evento']?>">
            </div>
            <div>
                <label for="texto">texto</label>
                <input type="text" name="texto" placeholder="Ingresar texto" value="<?= $evento['texto']?>">
            </div>
            <div>
                <label for="vista">vista</label>
                <select name="vista" id="vista">
                    <option value="">Mostrar Tarjeta</option>
                    <?php foreach ($acciones as $item):?>
                    <option <?= $item['value'] == $evento['vista'] ? 'selected' : '' ?> value="<?= $item['value']?>"><?= $item['nombre']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <input type="hidden" name="id" value="<?= $evento['id_evento']?>">
            <input type="hidden" name="imagenBefore" value="<?= $evento['imagen']?>">
            <input type="file" name="imagen" id="imagen">
            <input type="submit" value="Editar evento">
        </form>
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