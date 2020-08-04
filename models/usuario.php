<?php


class Usuario {
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;
    
    public function __construct() {
        //coneccion a la base de datos.
        $this->db= Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return password_hash($this->password,PASSWORD_BCRYPT, ['cost' => 4] );
    }

    function getRol() {
        return $this->rol;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setPassword($password): void {
        $this->password = $password;
    }

    function setRol($rol): void {
        $this->rol = $rol;
    }

    function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user',null);";
        $save = $this->db->query($sql);
       
        $result = false;
        if($save){
           $result= true; 
        }
        return $result;
    }
    
    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;
        
        //sacar numero de rows que hay (para comprobar que haya 1 solo)
        $sql = "SELECT * FROM usuarios WHERE email = '$email';";
        $login = $this->db->query($sql);
        
        if($login && $login->num_rows==1){
            $usuario = $login->fetch_object();
            
            //verificar la contrasena
            $verify = password_verify($password, $usuario->password);
            
            if($verify){
                $result= $usuario;
            }
        }
        return $result;
    }
}

