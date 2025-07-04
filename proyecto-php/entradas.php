<?php require_once("includes/cabecera.php"); ?>

    <div id="contenedor">
        <?php require_once("includes/lateral.php"); ?>
        <!-- CAJA PRINCIPAL -->
        <div id="principal">
            <h1>Todas entradas</h1>
            <?php
                $entradas = conseguirEntradas($db);
                if(!empty($entradas)):
                    while($entrada=mysqli_fetch_assoc($entradas)): 
            ?>
                        <article class="entrada">
                            <a href="entrada.php?id=<?=$entrada['id']?>">
                                <h2><?=$entrada['titulo']?></h2>
                                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                                <p>
                                    <?=substr($entrada['descripcion'],0,180)."..."?>
                                </p>
                            </a>
                        </article>
            <?php
                    endwhile;
                endif;
            ?>

<?php require_once("includes/pie.php"); ?>