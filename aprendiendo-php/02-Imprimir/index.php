<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir por Pantalla - Master en PHP</title>
</head>
<body>
    <h1>Master en PHP</h1>
    <?="Bienvenido al curso de PHP"?>
    <?php
        //Titular de la sección
        echo "<h3>Listado de videojuegos</h3>";
        
        /*
            Esta es una lista
            de videojuegos
            moderna
        */
        echo "<ul>"
              .  "<li>GTA</li>"
              .  "<li>Fifa</li>"
              .  "<li>Mario Bros</li>"
             ."</ul>";
        //Párrafo explicativo
        echo '<p>Esta es toda' . 'la lista' . ' de juegos </p>';
    ?>
</body>
</html>