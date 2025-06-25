<?php require_once 'helpers.php'?>
<!-- BARRA LATERAL -->
        <aside id="sidebar">
            <div id="login" class="bloque">
                <h3>Identificate</h3>
                <form action="login.php" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email">

                    <label for="contraseña">Contraseña</label>
                    <input type="password" name="contraseña">

                    <input type="submit" value="Entrar">
                </form>
            </div>

            <div id="register" class="bloque">
                <h3>Registrarse</h3>
                <form action="registro.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre">
                    
                    <?php echo mostrarError($_SESSION['errores'],'nombre'); ?>

                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos">

                    <?php echo mostrarError($_SESSION['errores'],'apellidos'); ?>

                    <label for="email">Email</label>
                    <input type="email" name="email">

                    <?php echo mostrarError($_SESSION['errores'],'email'); ?>

                    <label for="contraseña">Contraseña</label>
                    <input type="password" name="contraseña">

                    <?php echo mostrarError($_SESSION['errores'],'contraseña'); ?>

                    <input type="submit" name="submit" value="Registrar">
                </form>
                <?php borrarErrores(); ?>
            </div>
        </aside>