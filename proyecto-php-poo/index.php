<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!--Cabecera-->
    <header id="header">
        <div id="logo">
            <img src="assets/img/camiseta.png" alt="Camiseta Logo">
            <a href="index.php">
                Tienda de Camisetas
            </a>
        </div>
    </header>

    <!--Menu-->
    <nav id="menu">
        <ul>
            <li>
                <a href="#">Inicio</a>
            </li>
            <li>
                <a href="#">Categoria 1</a>
            </li>
            <li>
                <a href="#">Categoria 2</a>
            </li>
            <li>
                <a href="#">Categoria 3</a>
            </li>
            <li>
                <a href="#">Categoria 4</a>
            </li>
            <li>
                <a href="#">Categoria 5</a>
            </li>
        </ul>
    </nav>

    <div id="content">

        <!--Barra Lateral-->
        <aside id="lateral">

            <div id="login" class="block_aside">
                <form action="#" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    <label for="password">Contrasena</label>
                    <input type="password" name="password">
                    <input type="submit" value="Enviar">
                </form>

                <a href="#">Mis pedidos</a>
                <a href="#">Gestionar pedidos</a>
                <a href="#">Gestionar categorias</a>
            </div>

        </aside>

        <!--Contenido Central-->

        <div id="central">

            <div class="product">
                <img src="assets/img/camiseta.png">
                <h2>Camiseta Azul Ancha</h2>        
                <p>30 euros</p>
                <a href="#">Comprar</a>
            </div>

            <div class="product">
                <img src="assets/img/camiseta.png">
                <h2>Camiseta Azul Ancha</h2>        
                <p>30 euros</p>
                <a href="#">Comprar</a>
            </div>

            <div class="product">
                <img src="assets/img/camiseta.png">
                <h2>Camiseta Azul Ancha</h2>        
                <p>30 euros</p>
                <a href="#">Comprar</a>
            </div>

            <div class="product">
                <img src="assets/img/camiseta.png">
                <h2>Camiseta Azul Ancha</h2>        
                <p>30 euros</p>
                <a href="#">Comprar</a>
            </div>

        </div>

    </div>

    <!--Pie de pagina-->

    <footer id="footer">
        <p>Desarrollado por Lucas Ortins &copy; <?=date('Y')?></p>
    </footer>

</body>
</html>