<h1>Registrarse</h1>

<?php if(isset($_SESSION['registrer'])&&$_SESSION['registrer']=='complete'):?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['registrer'])&&$_SESSION['registrer']=='failed'):?>
    <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif;?>
<?php Utils::deleteSession('registrer') ?>

<form action="<?=base_url?>usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required>

    <label for="email">Email</label>
    <input type="text" name="email" required>

    <label for="password">Contrasena</label>
    <input type="text" name="password" required>

    <input type="submit" value="Registrarse">
</form>