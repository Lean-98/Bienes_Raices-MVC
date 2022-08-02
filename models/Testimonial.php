<?php

namespace Model;

class Testimonial extends ActiveRecord {

    protected static $tabla = 'testimoniales';
    protected static $columnasDB = ['id', 'nombreCompleto', 'contenido'];

    public $id;
    public $nombreCompleto;
    public $contenido;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombreCompleto = $args['nombreCompleto'] ?? '';
        $this->contenido = $args['contenido'] ?? '';
    }


    public function validar() {

        if(!$this->nombreCompleto) {
            self::$alertas ['error'][] = "El nombre del Cliente es obligatorio!";
        }

        if(!$this->contenido) {
            self::$alertas ['error'][] = "El contenido del testimonial es obligatorio!";
        }

       return self::$alertas ;

    }
}