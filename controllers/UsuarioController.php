<?php

require_once 'models/usuario.php';

class usuarioController {

    public function index() {
        echo "Controlador usuario, Accion index";
    }

    public function registro() {
        require_once 'views/usuario/registro.php';
    }

    public function save() {
        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            //Array de errores
            $errores = array();

            //validar los datos
            //validacion del campo nombre
            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                $nombre_validado = true;
            } else {
                $nombre_validado = false;
                $errores['nombre'] = "El nombre no es valido";
            }
            
            //validacion del campo apellidos
            if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
                $apellidos_validado = true;
            } else {
                $nombre_validado = false;
                $errores['apellidos'] = "Los apellidos no son validos";
            }
            
            //validacion del campo email
            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_validado = true;
            } else {
                $email_validado = false;
                $errores['email'] = "El mail no es valido";
            }
            
            //validacion del campo contrasena
            if (!empty($password)) {
                $password_validado = true;
            } else {
                $password_validado = false;
                $errores['password'] = "la contrasena esta vacia";
            }
            $guardar_usuario = false;
            
            if(count($errores) == 0){
                $guardar_usuario = true;    
                
                //cifrado de contrasena
                $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
                
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $save = $usuario->save();
                if ($save) {
                    $_SESSION['complete'] = "Registro completado correctamente";
                } else {
                    $_SESSION['errores'] = "Registro fallido, introduce bien los datos";
                }
            } else {
                
                $_SESSION['errores'] = $errores;
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        header("Location:" . base_url . "usuario/registro");
    }

    public function login() {
        if (isset($_POST)) {
           
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            $identity = $usuario->login();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'identificacion fallida';
            }
        }
        header("Location:" . base_url);
    }

    public function logout() {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header("Location:" . base_url);
    }

}
