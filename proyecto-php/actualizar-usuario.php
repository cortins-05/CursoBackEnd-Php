<?php

if(isset($_POST)){
    session_start();
    require_once "includes/conexion.php";
    $nombre = isset($_POST['nombre']) ? mysqli_escape_string($db,$_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_escape_string($db,$_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_escape_string($db,$_POST['email']) : false;

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
    
    $guardar_usuario = false;

    if(count($errores)==0){

        $guardar_usuario = true;

        $usuario = $_SESSION['usuario'];
        $sql = "update usuarios set nombre='$nombre',apellidos='$apellidos',email='$email' where id = ".$_SESSION['usuario']['id'];
        $guardar = mysqli_query($db,$sql);

        if($guardar){
            $_SESSION['usuario']['nombre']=$nombre;
            $_SESSION['usuario']['apellidos']=$apellidos;
            $_SESSION['usuario']['email']=$email;
            $_SESSION['completado'] = "La actualizacion del usuario se ha completado con exito";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }

    }else{
        $_SESSION['errores'] = $errores;
    }
}
header("Location:mis-datos.php");

?>