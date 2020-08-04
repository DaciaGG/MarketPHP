<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController {

    public function index() {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }

    public function ver() {
        if (isset($_GET['id'])) {

            //conseguir categoria
            $cate = new Categoria();
            $cate->setId($_GET['id']);

            //conseguir productos
            $producto = new Producto();
            $producto->setCategoriaId($_GET['id']);
            $productos = $producto->getAllCategoria();

            $categoria = $cate->getOne();
        }

        require_once 'views/categoria/ver.php';
    }

    public function crear() {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save() {
        //verificar que el usuario es administrador
        Utils::isAdmin();

        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

            if ($nombre) {
                $categoria = new Categoria();
                $categoria->setNombre($_POST['nombre']);

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $categoria->setId($id);
                    $save = $categoria->edit();
                } else {
                    $save = $categoria->save();
                };

                if ($save) {
                    $_SESSION['categoria'] = 'Complete';
                } else {
                    $_SESSION['categoria'] = 'Failed';
                }
            } else {
                $_SESSION['categoria'] = 'Failed';
            }
        } else {
            $_SESSION['categoria'] = 'Failed';
        }
        header('Location:' . base_url . 'categoria/index');
    }

    public function editar() {
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $edit = true;

            $categoria = new Categoria();
            $categoria->setId($_GET['id']);
            $cat = $categoria->getOne();

            require_once 'views/categoria/crear.php';
        } else {
            header('Location:' . base_url . 'categoria/index');
        }
    }

    public function eliminar() {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $categoria = new Categoria();
            $categoria->setId($_GET['id']);
            $delete = $categoria->delete();
            
           
           
            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
        header('Location:' . base_url . 'categoria/index');
    }
    


}
