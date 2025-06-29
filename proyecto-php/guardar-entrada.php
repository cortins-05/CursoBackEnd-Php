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
        $sql = "INSERT INTO entradas (usuario_id, categoria_id, titulo, descripcion, fecha)
                VALUES ($usuario, $categoria, '$titulo', '$descripcion', CURDATE());";

        $guardar = mysqli_query($db, $sql);

        if (!$guardar) {
            $_SESSION['errores_entrada'] = ["sql" => "Error en la base de datos: " . mysqli_error($db)];
        } else {
            $_SESSION['completado'] = "Entrada guardada correctamente.";
        }
    } else {
        $_SESSION['errores_entrada'] = $errores;
    }
}

header("Location: index.php");
exit;
