<?php require_once("conexion.php"); ?>
<?php require_once 'helpers.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Videojuegos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Cabezera -->
    <header id="cabezera">
        <!-- LOGO -->
        <div id="logo">
            <a href="index.php">
                Blog de Videojuegos
            </a>
        </div>
    
    
    <!-- MENU -->
        <?php $categorias = conseguirCategorias($db); ?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php if($categorias): ?>
                    <?php while ($categoria = mysqli_fetch_assoc($categorias)): ?>
                        <li>
                            <a href="categoria.php?id=<?= $categoria['id'] ?>">
                                <?= htmlspecialchars($categoria['nombre']) ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
                <li>
                    <a href="index.php">Sobre mi</a>
                </li>
                <li>
                    <a href="index.php">Contacto</a>
                </li>
            </ul>
        </nav>
    </header>