<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion</title>
</head>
<body>
    <h1>Validar formularios en PHP</h1>

    <?php
        if(isset($_GET['error'])){
            if($error = $_GET['error']){
                if($error == "faltan_valores"){
                    echo '<strong style="color:red">Introduce todos los datos en todos los campos del formulario</strong>';
                }
            }
        }
    ?>

    <form action="procesar_formulario.php" method="POST">
        <label for="nombre">Nombre:</label> <br>
        <input type="text" name="nombre" pattern="[A-Za-z]+"> <br>
        
        <label for="apellidos">Apellidos:</label> <br>
        <input type="text" name="apellidos" pattern="[A-Za-z]+"> <br>

        <label for="edad">Edad:</label> <br>
        <input type="number" name="edad" pattern="[0-9]+"> <br>

        <label for="email">Email:</label> <br>
        <input type="email" name="email"> <br>

        <label for="contraseña">Contraseña:</label> <br>
        <input type="password" name="contraseña"> <br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>