<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido']=='complete'):?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Tu pedido se ha confirmado con exito, una vez que realices la transferencia
        bancaria a la cuenta 6774838347F con el coste del pedido, sera procesado y enviado
    </p>
    <br>
    <?php if(isset($_SESSION['pedido'])): ?>
        <h3>Datos del pedido:</h3>
        Numero de pedido: <?=$pedido->id ?>
        <br>
        Total a pagar: <?=$pedido->coste ?>
        <br>
        Productos:
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>
            <?php while($producto = $pedido_productos->fetch_object()):?>
                <tr>
                    <?php if($producto->imagen != "null") :?>
                        <td><img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img_carrito"></td>
                    <?php else: ?>
                        <td><img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito"></td>
                    <?php endif; ?>
                    <td><a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?= $producto->nombre ?></a></td>
                    <td><?= $producto->precio ?></td>
                    <td><?= $producto->unidades ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
<?php elseif(isset($_SESSION['pedido'])&&$_SESSION['pedido']!='complete'):?>
    <h1>Tu pedido NO se ha confirmado</h1>
<?php endif;?>