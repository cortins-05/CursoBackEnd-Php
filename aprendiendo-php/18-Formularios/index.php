<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
</head>
<body>

    <h1>Formulario</h1>
    <form action="" method="POST" >
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" placeholder="Introduce tu nombre" autofocus required> <br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required> <br>

        <label for="boton">Boton:</label>
        <input type="button" name="boton" value="Clicame"> <br>

        <label for="sexo">Sexo:</label> <br>
        Hombre: <input type="checkbox" name="sexo" value="hombre">
        Mujer: <input type="checkbox" name="sexo" value="mujer"> <br>

        <label for="color">Color:</label>
        <input type="color" name="color"> <br>
        
        <label for="fecha">Fecha: </label>
        <input type="date" name="fecha"> <br>

        <label for="correo">Email:</label>
        <input type="email" name="correo"> <br>

        <label for="fichero">Archivo:</label>
        <input type="file" name="fichero" multiple> <br>

        <label for="numero">Numero: </label>
        <input type="number" name="numero"> <br>

        <label for="contraseña">Contraseña: </label>
        <input type="password" name="contraseña"> <br>

        <label for="radio">Radio:</label>
        Europa: <input type="radio" name="radio" value="Europa">
        Asia: <input type="radio" name="radio" value="Asia">
        America Sur: <input type="radio" name="radio" value="America Sur"> <br>

        <textarea></textarea> <br>

        Peliculas:
        <select name="peliculas">
            <option value="spiderman">Spiderman</option>
            <option value="batman">Batman</option>
            <option value="jungla">La jungla de Cristal</option>
        </select> <br>

        <label for="pass">Pagina web:</label>
        <input type="url" name="pass"> <br>

        <input type="submit" value="Enviar">
    </form>

</body>
</html>