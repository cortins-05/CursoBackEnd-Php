<h1>Algunos de nuestros Productos</h1>

<?php while($pro = $productos->fetch_object()):?>
    <div class="product">
        <a href="<?=base_url?>producto/ver&id=<?=$pro->id?>">
            <?php if($pro->imagen != "null") :?>
                <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>">
            <?php else: ?>
                <img src="<?=base_url?>assets/img/camiseta.png">
            <?php endif; ?>
            <h2><?=$pro->nombre?></h2>
        </a>
        <p><?=$pro->precio?></p>
        <a href="#" class="button">Comprar</a>
    </div>
<?php endwhile;?>
