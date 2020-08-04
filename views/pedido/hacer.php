<?php if (isset($_SESSION['identity'])): ?>

    <h1>Hacer Pedido </h1>
    <p>
        <a href="<?= base_url ?>carrito/index">Ver el carrito</a>
    </p>
    <br/>
    
    <h3>Domicilio a donde sera enviado el pedido</h3>
    <form action="<?=base_url?>pedido/add" method="POST">
        <label for="provincia">Provincia </label> 
        <input type="text" name="provincia" required/>
        
        <label for="localidad">Ciudad </label> 
        <input type="text" name="localidad" required/>
        
        <label for="direccion">Direccion </label> 
        <input type="text" name="direccion" required/>
        
        <input type="submit" value="Confirmar">
    </form>
    
    
<?php else: ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logueado en la web para poder realizar tu pedido</p>
<?php endif; ?>
