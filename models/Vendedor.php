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
            self::$alertas ['error'][] = "El Nombre es obligatorio!";
        }

        if(!$this->apellido) {
            self::$alertas ['error'][] = "El Apellido es obligatorio!";
        }

        if(!$this->telefono) {
            self::$alertas ['error'][] = "Debes agregar un número de teléfono!";
        }

        if(!$this->email) {
            self::$alertas ['error'][] = "Debes agregar un E-mail!";
        }
        
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas ['error'][] = "Formato de E-mail no válido!";
        }

        if(!$this->imagen) {
            self::$alertas ['error'][] = "La Imagen del Vendedor/a es Obligatoria!";
        }
        
        if(!preg_match("/[0-9]{11}/", $this->telefono) or strlen($this->telefono) > 11) {
            self::$alertas ['error'][] = "Formato de Teléfono no válido!";
        }

       return self::$alertas ;

    }
}