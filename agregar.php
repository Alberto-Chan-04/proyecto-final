<?php
    require_once('./db.php');
    $db = conexion();


    if ($_POST) {
        $nombre = $_POST['nombre'];
        $matricula = $_POST['matricula'];
        $semestre = $_POST['semestre'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $evento = $_POST['evento'];
        $carrera = $_POST['carrera'];

        $values = join("','",array_values($_POST));

        $query = "INSERT INTO alumnos(nombre,matricula,semestre,telefono,correo,evento,carrera) VALUES ('$values')";
        
        echo $query;

        $res = mysqli_query($db,$query);
        
        header('Location: ./?msg=se agrego correctamente');
    }

?>
