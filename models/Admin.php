<?php

namespace Model;

class Admin extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password', 'admin'];

    public $id;
    public $email;
    public $password;
    public $admin;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->admin = $args['admin'] ?? '0';
    }


    public function validar() {
        if(!$this->email) {
            self::$alertas ['error'][] = 'El Email es Obligatorio!';
        }

        if(!$this->password) {
            self::$alertas ['error'][] = 'El Password es Obligatorio!';
        }

        return self::$alertas ;
    }

    public function existeUsuario() {
        // Revisar si un usuario existe o no
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

       if(!$resultado->num_rows) {
          self::$alertas ['error'][] = 'El usuario No Existe!';  
          return;
       }
       return $resultado;
    }

    public function comprobarPassword($resultado) {
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);

        if(!$autenticado) {
            self::$alertas ['error'][] = 'El Password es Incorrecto!';
        }

        return $autenticado;
    }

    public function autenticar() {
        session_start();

        // Llenar el arreglo de session
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
        
    }
}