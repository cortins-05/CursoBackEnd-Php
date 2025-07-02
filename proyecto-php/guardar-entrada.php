<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'includes/conexion.php';

    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit;
    }

    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, trim($_POST['titulo'])) : '';
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, trim($_POST['descripcion'])) : '';
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : 0;
    $usuario = (int)$_SESSION['usuario']['id'];

    $errores = [];

    if (empty($titulo)) {
        $errores['titulo'] = "El título no puede estar vacío.";
    }

    if (empty($descripcion)) {
        $errores['descripcion'] = "La descripción no puede estar vacía.";
    }

    if (empty($categoria) || !is_numeric($categoria)) {
        $errores['categoria'] = "La categoría no es válida.";
    }

    if (count($errores) === 0) {
        if(isset($_GET['editar'])){
            $entrada_id = $_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];
            $sql = "update entradas set titulo='$titulo', descripcion='$descripcion',categoria_id=$categoria where id=$entrada_id and usuario_id=$usuario_id";
        }else{
            $sql = "INSERT INTO entradas (usuario_id, categoria_id, titulo, descripcion, fecha) VALUES ($usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        }
        $guardar = mysqli_query($db, $sql);
        header("Location: index.php");
    } else {
        $_SESSION['errores_entrada'] = $errores;
        if(isset($_GET['editar'])){
            header("Location:editar-entrada.php?=id".$_GET['editar']);
        }else{
            header("Location:crear-entradas.php");
        }
    }
}


exit;
