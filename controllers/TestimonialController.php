<?php 

namespace Controllers;

use MVC\Router;
use Model\Testimonial;

class TestimonialController {

    public static function crear ( Router $router ) {

        $testimonial = new Testimonial;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
      
            // Crea una nueva instancia 
            $testimonial = new Testimonial($_POST['testimonial']);
            
            // Validar que no haya campos vacios
            $alertas  = $testimonial->validar();
             
            if(empty($alertas )) {
            // Guarda en la base de datos
            $testimonial->guardar();
            Testimonial::setAlerta('exito', 'Testimonial Creado Correctamente!'); 
            // Redireccionar al login
            header('Refresh: 3; url= /admin');
        }
    }

        $alertas = Testimonial::getAlertas();   
        $router->render('testimoniales/crear', [
            'alertas' => $alertas ,
            'testimonial' => $testimonial
        ]);
}


    public static function actualizar (Router $router) {
        
        $id = validarORedireccionar('propiedades/admin');
         // Obtener datos del blog a actualizar
         $testimonial = Testimonial::find($id);

         $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Asignar los valores
            $args = $_POST['testimonial'];
            
            // Sincronizar objeto en memoria con lo que el usuario escribió
            $testimonial->sincronizar($args);
        
            // Validación
            $alertas  = $testimonial->validar();
        
        
            if(empty($alertas )) {
                $testimonial->guardar();
                Testimonial::setAlerta('exito', 'Testimonial Actualizado Correctamente!'); 
                // Redireccionar al login
                header('Refresh: 3; url= /admin');
            }
        }

            $alertas = Testimonial::getAlertas();
            $router->render('testimoniales/actualizar', [
                'alertas' => $alertas ,
                'testimonial' => $testimonial 
            ]);
        }


        public static function eliminar() {
       
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // validar el id
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
    
                if($id) {
                    // Valida el tipo a eliminar
                    $tipo = $_POST['tipo']; 
                    
                    if(validarTipoContenido($tipo)) {
                        $testimonial = Testimonial::find($id);
                        $testimonial ->eliminar();
                        header('Location: /admin');
                    }
                }
            }      
        }
}    