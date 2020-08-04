<h1>Carrito de la compra</h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito'] >= 1)): ?>

    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Elimiar</th>
        </tr>
        <?php
        foreach ($carrito as $indice => $elemento):
            $producto = $elemento['producto'];
            ?>
            <tr>
                <td>
                    <?php if ($producto->imagen): ?>
                        <img class="img-carrito" src = "<?= base_url ?>uploads/images/<?= $producto->imagen ?>">
                    <?php else: ?>
                        <img class="img-carrito" src="assets/img/carrito.png"?> 
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
                </td>
                <td>
                    <?= $producto->precio ?>
                </td>
                <td>
                    <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button-plus">+</a>
                    <?= $elemento['unidades'] ?>
                    <a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="button-plus ">-</a>
                </td>
                <td>
                    <a href="<?= base_url ?>carrito/delete&index=<?=$indice?>" class="button button-gestion  ">Quitar producto</a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>
    <?php $stats = Utils::statsCarrito() ?>
    <div class="total">
        <h3 >Precio Total = <?= $stats['total'] ?> €</h3>
        <a href="<?= base_url ?>pedido/hacer" class="button">Hacer pedido</a>
        <a href="<?= base_url ?>carrito/deleteAll" class="button button-gestion ">Vaciar Carrito </a>
    </div>
<?php else: ?>
    <p>El carrito esta vacio </p>
<?php endif; ?>