<h1>Carrito de la Compra</h1>

<?php if(isset($_SESSION['carrito'])&&count($_SESSION['carrito'])>0): ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
            <?php foreach($carrito as $indice=>$elemento): 
                $producto = $elemento['producto'];
            ?>
                <tr>
                    <?php if($producto->imagen != "null") :?>
                        <td><img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img_carrito"></td>
                    <?php else: ?>
                        <td><img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito"></td>
                    <?php endif; ?>
                    <td><a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?= $producto->nombre ?></a></td>
                    <td><?= $producto->precio ?></td>
                    <td>
                        <?= $elemento['unidades'] ?>
                        <div class="updown-unidades">
                            <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button">+</a>
                            <a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="button">-</a>
                        </div>
                    </td>
                    <td><a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="button button-carrito button-red">Quitar producto</a></td>
                </tr>
            <?php endforeach; ?>
    </table>
    <br>
    <div class="delete-carrito">
        <a href="<?=base_url?>carrito/delete_all" class="button button-delete button-red">Vaciar carrito</a>
        <div class="total-carrito">
            <?php $stats = Utils::statsCarrito();?>
            <h3>Precio total: <?=$stats['total']?>€</h3>
            <a href="<?=base_url?>pedido/index" class="button button-pedido">Hacer pedido</a>
        </div>
    </div>
<?php else:?>
    <p>Añade cosas al carrito, empieza a navegar!</p>
<?php endif;?>