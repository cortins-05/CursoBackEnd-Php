<?php
session_start();
if(isset($_POST['submit'])){
    if(isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
    }else{
        $nombre = false;
    }

    if(isset($_POST['apellidos'])){
        $apellidos = $_POST['apellidos'];    
    }else{
        $apellidos = false;
    }
    
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $email = false;
    }
    
    if(isset($_POST['contraseña'])){
        $password = $_POST['contraseña'];
    }else{
        $password = false;
    }

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
    
    if(count($errores)==0){
        //Insertar usuario en la bd

    }else{

    }

}

var_dump($_POST);

?>