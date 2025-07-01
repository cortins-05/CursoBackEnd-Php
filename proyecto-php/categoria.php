<?php require_once("includes/cabecera.php"); ?>
<?php require_once "includes/lateral.php"; ?>

<?php
    $categoria_actual = conseguirCategoria($db,$_GET['id']);
    if(!isset($categoria_actual['id'])){
        header("Location:index.php");
    }
?>

<div id="principal">
            <h1>Entradas de <?=$categoria_actual['nombre']?></h1>
            <?php
                $entradas = conseguirEntradas($db,null,$_GET['id']);
                if(!empty($entradas)):
                    while($entrada=mysqli_fetch_assoc($entradas)): 
            ?>
                        <article class="entrada">
                            <a href="">
                                <h2><?=$entrada['titulo']?></h2>
                                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                                <p>
                                    <?=substr($entrada['descripcion'],0,180)."..."?>
                                </p>
                            </a>
                        </article>
            <?php
                    endwhile;
                else:
            ?>
            <div class="alerta">No hay entradas para esta categoría</div>
            <?php endif; ?>

            <div id="ver-todas">
                <a href="entradas.php">Ver todas las entradas</a>
            </div>

<?php require_once("includes/pie.php"); ?>