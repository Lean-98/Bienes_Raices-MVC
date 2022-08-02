<?php

namespace Model;

class Blog extends ActiveRecord {

    protected static $tabla = 'blogs';
    protected static $columnasDB = ['id', 'titulo', 'fecha', 'escritor', 'contenido', 'imagen'];

    public $id;
    public $titulo;
    public $fecha;
    public $escritor;
    public $contenido;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->fecha = date('Y/m/d');
        $this->escritor = $args['escritor'] ?? '';
        $this->contenido = $args['contenido'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }


    public function validar() {
        if(!$this->titulo) {
            self::$alertas ['error'][] = "El Titulo es obligatorio!";
        }

        if(!$this->escritor) {
            self::$alertas ['error'][] = "El nombre del Escritor es obligatorio!";
        }

        if(!$this->contenido) {
            self::$alertas ['error'][] = "El contenido del blog es obligatorio!";
        }

        if(!$this->imagen) {
            self::$alertas ['error'][] = "La Imagen del blog es Obligatoria!";
        }

       return self::$alertas ;

    }
}