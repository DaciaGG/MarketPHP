

<?php if (isset($edit) && isset($cat) && is_object($cat)) : ?>
    <h1>Editar Categoria <?= $cat->nombre ?></h1>
    <?php $url_action = base_url . "categoria/save&id=" . $cat->id; ?>
<?php else: ?>
    <h1>Crear Categoria</h1>
    <?php $url_action = base_url . "categoria/save"; ?> 
<?php endif; ?>

<form action="<?= $url_action ?>" method="POST">
    <label for="nombre"> Nombre </label>
    <input type="text" name="nombre" value="<?= isset($cat) && is_object($cat) ? $cat->nombre : '' ?>" />
    
    <input type="submit" value="Guardar"/>
</form>