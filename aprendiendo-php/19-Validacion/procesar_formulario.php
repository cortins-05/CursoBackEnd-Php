<?php
$error = "faltan_valores";

if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['edad']) && !empty($_POST['email'])){
    $error = "ok";
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $pass = $_POST['contraseña'];

    //Validar el nombre
    if(!is_string($nombre) || !preg_match("/[1-9]+/",$nombre)){
        $error = 'nombre'; 
    }

    if(!is_string($apellidos) || !preg_match("/[1-9]+/",$apellidos)){
        $error = 'apellidos'; 
    }

    if(!is_int($edad) || filter_var($edad,FILTER_VALIDATE_INT)){
        $error = 'edad'; 
    }

    if(!is_int($email) || filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error = 'email';
    }

    if(empty($pass) || strlen(($pass)<5)){
        $error = "password";
    }

}else{
    $error = "faltan_valores";
    header("Location:index.php?error=$error");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion de Formularios PHP</title>
</head>
<body>
    <?php if($error='ok'):?>
    <h1>Datos validados correctamente:</h1>
        <p><?=$nombre?></p>
        <p><?=$apellidos?></p>
        <p><?=$edad?></p>
        <p><?=$email?></p>
    <?php endif; ?>
</body>
</html>