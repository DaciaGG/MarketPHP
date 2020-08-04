
<h1>Algunos de nuestros productos...</h1>

<?php while ($product = $productos->fetch_object()): ?>
    <div class="product">
        <a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
            <?php if ($product->imagen): ?>
                <img src = "<?= base_url ?>uploads/images/<?= $product->imagen ?>">
            <?php else: ?>
                <img src="assets/img/camiseta.png"?> 
            <?php endif; ?>
            <h2><?= $product->nombre ?></h2>
        </a>
        <p><?= $product->precio ?> Euros</p>
        <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>                    
    </div>
<?php endwhile; ?>
