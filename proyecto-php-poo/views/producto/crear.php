<?php if(isset($edit) && isset($pro) && is_object($pro)):?>
    <h1>Editar Producto <?=$pro->nombre?></h1>
    <?php $url_action = base_url."producto/save"; ?>
<?php else:?>
    <h1>Crear nuevos Productos</h1>
    <?php $url_action = base_url."producto/save"; ?>
<?php endif;?>

<div class="form_container">
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

        <?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
            <input type="hidden" name="id" value="<?=$pro->id?>">
        <?php endif; ?>

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : '';?>" required>

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion"><?=isset($pro) && is_object($pro) ? $pro->descripcion : '';?></textarea>

        <label for="precio">Precio</label>
        <input type="number" name="precio" step="0.01" value="<?=isset($pro) && is_object($pro) ? $pro->precio : '';?>" required>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : '';?>" required>

        <label for="categoria">Categoria</label>
        <?php $categorias = Utils::showCategorias()?> 
        <select name="categoria">
            <?php while($cat = $categorias->fetch_object()):?>
                <option value="<?=$cat->id?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : '';?> >
                    <?=$cat->nombre?>
                </option>
            <?php endwhile;?>
        </select>
        
        <label for="imagen">Imagen</label>
        <?php if(isset($pro)&&is_object($pro)&&!empty($pro->imagen)): ?>
            <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb">
        <?php endif;?>
        <input type="file" name="imagen">

        <input type="submit" value="Guardar">
    </form>
</div>
