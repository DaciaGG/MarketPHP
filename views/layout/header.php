<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Tronch's Market</title>
        <link rel="stylesheet" href="<?= base_url ?>assets/css/style.css"/>
    </head>
    <body>
        <div id="container">
            <!--HEADER-->
            <header id="header" >
                <div id="logo">
                    <img src="<?= base_url ?>assets/img/carrito.png" alt="Logo"/>
                    <a href="index.php">
                        Tronch's Market
                    </a>
                </div>     
            </header>

            <!--MENU-->
            <?php $categorias = Utils::showCategorias() ?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?= base_url ?>">Inicio</a>
                    </li>
                    <?php while ($cat = $categorias->fetch_object()): ?>
                        <li>
                            <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?= $cat->nombre ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </nav>

            <div id="contenido">

