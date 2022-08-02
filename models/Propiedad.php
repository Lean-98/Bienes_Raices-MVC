<?php

namespace Model;

class Propiedad extends ActiveRecord {

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedor_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedor_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedor_id = $args['vendedor_id'] ?? '';
    }

    public function validar() {
        if(!$this->titulo) {
            self::$alertas ['error'][] = "Debes agregar un Titulo!";
        }
    
        if(!$this->precio) {
            self::$alertas ['error'][] = "El Precio es Obligatorio!";
        }
    
        if( strlen( $this->descripcion ) < 50 ) {
            self::$alertas ['error'][] = "La Descripción es obligatoria y debe tener al menos 50 caracteres!";
        }
    
        if(!$this->habitaciones) {
            self::$alertas ['error'][] = "Debes agregar al menos una habitación!";
        }
    
        if(!$this->wc) {
            self::$alertas ['error'][] = "Debes agregar al menos un baño!";
        }
    
        if(!$this->estacionamiento) {
            self::$alertas ['error'][] = "El número de lugares de Estacionamiento es obligatorio!";
        }
    
        if(!$this->vendedor_id) {
            self::$alertas ['error'][] = "Seleccione un Vendedor!";
        }
    
        if(!$this->imagen) {
             self::$alertas ['error'][] = "La Imagen de la propiedad es Obligatoria!";
         }
        
        return self::$alertas;
    }
    

}