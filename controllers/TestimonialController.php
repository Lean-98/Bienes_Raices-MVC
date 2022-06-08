<?php 

namespace Controllers;

use MVC\Router;
use Model\Testimonial;

class TestimonialController {

    public static function crear ( Router $router ) {

        $testimonial = new Testimonial;
        $errores = Testimonial::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
      
            // Crea una nueva instancia 
            $testimonial = new Testimonial($_POST['testimonial']);
            
            // Validar que no haya campos vacios
            $errores = $testimonial->validar();
             
            if(empty($errores)) {
            // Guarda en la base de datos
            $testimonial->guardar();   
        }
    }

        $router->render('testimoniales/crear', [
            'errores' => $errores,
            'testimonial' => $testimonial
        ]);
}


    public static function actualizar (Router $router) {
        
        $id = validarORedireccionar('propiedades/admin');
         // Obtener datos del blog a actualizar
         $testimonial = Testimonial::find($id);

         $errores = Testimonial::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Asignar los valores
            $args = $_POST['testimonial'];
            
            // Sincronizar objeto en memoria con lo que el usuario escribió
            $testimonial->sincronizar($args);
        
            // Validación
            $errores = $testimonial->validar();
        
        
            if(empty($errores)) {
                $testimonial->guardar();
            }
        }

            $router->render('testimoniales/actualizar', [
                'errores' => $errores,
                'testimonial' => $testimonial 
            ]);
        }


        public static function eliminar () {
       
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
                    }
                }
            }      
        }

}    