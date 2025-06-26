<?php
require_once 'includes/conexion.php';

if(isset($_POST)){
    $email = trim($_POST['email']);
    $password = trim($_POST['contraseña']);

    $sql = "SELECT * from usuarios where email = '$email'";

    $login = mysqli_query($db,$sql);

    if($login && mysqli_num_rows($login)==1){
        $usuario = mysqli_fetch_assoc($login);
        $verify = password_verify($password,$usuario['password']);
        if($verify){
            $_SESSION['usuario'] = $usuario;
            if(isset($_SESSION['error_login'])){
                $_SESSION['error_login'] = null;
            }
        }else{
            $_SESSION['error_login'] = "Login incorrecto";
        }
    }else{
        $_SESSION['error_login'] = "Login incorrecto";
    }

}

header("Location:index.php");

?>