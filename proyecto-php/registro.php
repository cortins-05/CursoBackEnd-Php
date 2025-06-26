<?php
if(isset($_POST)){
    
    //Conexion a la bd
    require_once 'includes/conexion.php';

    //Recoger los valores del formulario de registro
    $nombre = isset($_POST['nombre']) ? mysqli_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_escape_string($db,$_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_escape_string($db,trim($_POST['email'])) : false;
    $password = isset($_POST['contraseña']) ? mysqli_escape_string($db,trim($_POST['contraseña'])) : false;

    //Array de errores
    $errores = array();
    
    //Validar los datos antes de guardar
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validado = true;
    }else{
        $errores['nombre'] = "El nombre no es valido";
        $nombre_validado = false;
    }

    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/",$apellidos)){
        $apellidos_validado = true;
    }else{
        $errores['apellidos'] = "El apellidos no es valido";
        $apellidos_validado = false;
    }

    if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $errores['email'] = "El email no es valido";
        $email_validado = false;
    }

    if(!empty($password)){
        $password_validado = true;
    }else{
        $errores['password'] = "El password no es valido";
        $password_validado = false;
    }
    
    $guardar_usuario = false;

    if(count($errores)==0){

        $guardar_usuario = true;

        //Cifrar contraseña
        $password_segura = password_hash($password,PASSWORD_BCRYPT, ['cost'=>4]);
        

        //Insertar usuario en la bd
        $sql = "INSERT into usuarios values(null, '$nombre', '$apellidos', '$email', '$password_segura', curdate())";
        $guardar = mysqli_query($db,$sql);

        if($guardar){
            $_SESSION['completado'] = "El registro se ha completado con exito";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }

    }else{
        $_SESSION['errores'] = $errores;
    }
}

header('Location:index.php');

?>