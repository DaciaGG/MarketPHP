<h1> Gestionar Categorias </h1>

<p class="bloque" >Atencion: Para poder borrar una categoria, no tiene que tener productos <br/> (haz click sobre la categoria para mas informacion)</p>
<br/>
<a href= "<?= base_url ?>categoria/crear" class="button button-small"> Crear categoria</a>

<?php if (isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'Complete'): ?>
    <strong class="alert_green"> La categoria se ha creado o editado correctamente</strong>
<?php elseif (isset($_SESSION['categoria']) && $_SESSION['categoria'] != 'Complete'): ?>
    <strong class="alert_red"> La categoria NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('categoria'); ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green"> La categoria se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red"> La categoria NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()): ?>
        <tr>
            <td><?= $cat->id; ?></td>
            <td><a href="<?= base_url ?>categoria/ver&id=<?= $cat->id ?>"><?= $cat->nombre; ?></a></td>
            <td class="link-container">
                <a href="<?= base_url ?>categoria/editar&id=<?= $cat->id ?>" class="button button-gestion">Editar nombre</a>
                <a href="<?= base_url ?>categoria/eliminar&id=<?= $cat->id ?>" class="button button-gestion button-red ">Eliminar</a>
            </td> 


        </tr>

    <?php endwhile; ?>

</table>