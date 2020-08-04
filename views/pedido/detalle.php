<h1>Detalle del pedido</h1>

<?php if (isset($pedido)): ?>
    <?php $pedido = $pedido->fetch_object() ?> 

    <?php if (isset($_SESSION['admin'])): ?>
        <h3>Cambiar Estado del pedido:</h3>
        <br/>
        <form action="<?=base_url?>pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id"/> 
                
            <select name="estado"> 
                <option value="confirm" <?=$pedido->estado == 'confirm'? 'selected': ' '?>>Pendiente</option>
                <option value="preparation" <?=$pedido->estado == 'preparation'? 'selected': ' '?>>En preparacion</option>
                <option value="ready" <?=$pedido->estado == 'ready'? 'selected': ' '?>>Preparado para enviar</option>
                <option value="sended" <?=$pedido->estado == 'sended'? 'selected': ' '?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado"/>
            
        </form>
    <?php endif; ?>

    <br/>    
    <h3>Direccion de envio: </h3>
    <br/>
    <p>
        Provincia: <?= $pedido->provincia ?> <br/>
        Ciudad: <?= $pedido->localidad ?>   <br/>
        Direccion: <?= $pedido->direccion ?><br/>
    </p>
    <br/>
    <h3>Datos del pedido:</h3>
    <br/>
    <p>
        Numero de pedido: <?= $pedido->id ?>              <br/>
        Estado: <?= Utils::showStatus($pedido->estado)?>                     <br/>
        Costo total a pagar: <?= $pedido->coste ?> €  <br/> <br/>
        Productos en el envio: 
    </p>

    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
        </tr> 
        <?php while ($producto = $productos->fetch_object()): ?>

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

