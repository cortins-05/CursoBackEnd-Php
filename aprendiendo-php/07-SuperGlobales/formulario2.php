<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
</head>
<body>
    <h1>Formulario en PHP</h1>

    <form method="POST" action="recibir2.php">
        <p>
            <label>Nombre:</label>
            <input type="text" name="nombre">
        </p>

        <p>
            <label>Apellidos</label>
            <input type="text" name="apellidos">
        </p>
        <input type="submit" value="enviar datos">
    </form>
</body>
</html>
