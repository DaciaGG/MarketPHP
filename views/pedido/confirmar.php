<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Tu pedido ha sido guardado con exito, una vez que realice 
        la transferencia bancaria a la cuenta 0303456 con el coste del pedido, sera 
        procesado y enviado.
    </p>
    <br/>
    <?php if (isset($pedido)): ?>
        <h3>Datos del pedido:</h3>
        <br/>
        Numero de pedido: <?= $pedido->id ?>              <br/>
        Costo total a pagar: <?= $pedido->coste ?> €  <br/> <br/>

        Productos:

        <table>
            <?php while ($producto = $productos->fetch_object()): ?>

                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>        
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
                        <?= $producto->unidades ?>
                    </td>
                </tr>



            <?php endwhile; ?>
        </table>
    <?php endif; ?>


<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h1>Tu pedido no ha podido procesarse. </h1>
    <p>Intentalo nuevamente, por favor.</p>
<?php endif; ?>

