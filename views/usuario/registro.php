<h1> Registrarse </h1>

<?php if (isset($_SESSION['complete'])): ?>
    <strong class="alert_green"> Registro completado correctamente </strong>
    <?php Utils::deleteSession('complete'); ?>
<?php elseif (isset($_SESSION['errores'])): ?>
    <strong class="alert_red"> Registro fallido, introduce bien los datos </strong>
<?php endif; ?>


<form action="<?= base_url ?>usuario/save" method="POST">
    <label for="nombre">Nombre : </label>
    <input type="text" name="nombre" required />
    <strong class="alert_red">
        <?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['nombre'] : ' '; ?>
    </strong>

    <label for="apellidos">Apellidos : </label>
    <input type="text" name="apellidos" required />
    <strong class="alert_red">
        <?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['apellidos'] : ' '; ?>
    </strong>
    
    <label for = "email">Email : </label>
    <input type = "email" name = "email" required />
    <strong class="alert_red">
        <?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['email'] : ' '; ?>
    </strong>
    
    <label for = "password">Contrasena : </label>
    <input type = "password" name = "password" required />
    <strong class="alert_red">
        <?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['password'] : ' '; ?>
    </strong>
    
    <input type = "submit" value = "Registrarse" />
</form>
<?php Utils::deleteSession('errores'); ?>
    
