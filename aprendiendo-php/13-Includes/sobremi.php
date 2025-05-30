<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Includes</title>
</head>
<body>
    <!--Cabecera-->
    <div class="cabecera">
        <h1>Includes en PHP</h1>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="sobremi.php">Sobre mi</a></li>
            <li><a href="contacto.php">Contacto</a></li>
        </ul>
    </div>

    <!--Contenido-->
    <div>
        <h2>Esta es la pagina de Sobre Mi</h2>
        <p>Texto de prueba de la pagina de Sobre Mi</p>
    </div>

    <!--Pie de pagina-->
    <footer>
        Todos los derechos reservados &copy; Lucas Ortins <?=date('Y')?>
    </footer>
</body>
</html>