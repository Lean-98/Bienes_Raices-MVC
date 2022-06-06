<?php

namespace Model;

class Vendedor extends ActiveRecord {

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'email', 'imagen'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }


    public function validar() {
        if(!$this->nombre) {
            self::$errores[] = "El Nombre es obligatorio!";
        }

        if(!$this->apellido) {
            self::$errores[] = "El Apellido es obligatorio!";
        }

        if(!$this->telefono) {
            self::$errores[] = "Debes agregar un número de teléfono!";
        }

        if(!$this->email) {
            self::$errores[] = "Debes agregar un E-mail!";
        }
        
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$errores[] = "Formato de E-mail no válido!";
        }

        if(!$this->imagen) {
            self::$errores[] = "La Imagen del Vendedor/a es Obligatoria!";
        }
        
        if(!preg_match("/[0-9]{11}/", $this->telefono) or strlen($this->telefono) > 11) {
            self::$errores[] = "Formato de Teléfono no válido!";
        }

       return self::$errores;

    }
}