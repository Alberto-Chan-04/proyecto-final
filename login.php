<?php
session_start();
require_once('./db.php');
$db = conexion();

$session = $_SESSION['auth'] ?? false;

if ($session) {
    header('Location: http://localhost/hackathon/');
    exit;
}


$msg = $_GET['msg'] ?? '';

if ($_POST) {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $auth = mysqli_query($db,"SELECT * FROM auth WHERE correo = '$correo' and contraseña = '$contraseña' ");
    $auth = $auth->num_rows;

    if ($auth) {
        $_SESSION = [
            'auth' => true,
        ];
        header('Location: http://localhost/hackathon/admin.php');
    }else{
        header('Location: http://localhost/hackathon/login.php?msg=Correo o contraseña incorrecta');
    }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<script>
    if ('<?= $msg ?>') {
      setTimeout(() => {
        alert('<?php echo $msg; ?>');
        window.location.href = 'http://localhost/hackathon/login.php'
      }, 600);

    }
  </script>
<body style=" background: linear-gradient(rgb(0%, 60%, 100%), rgb(0%, 30%, 70%));">
    <div class="container" style="min-height: 100dvh; display: flex; align-items: center; justify-content: center;">
        <div class="row justify-content-center">
            <div class="">
                <div class="card" style="width: 500px;">
                    <div class="card-header">Iniciar sesión</div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="correo">Correo Electronico:</label>
                                <input type="text" id="correo" name="correo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="contraseña">Contraseña:</label>
                                <input type="password" id="contraseña" name="contraseña" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
