<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Model\Blog;
use Model\Testimonial;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController {
    public static function index(Router $router) {
        
        $propiedades = Propiedad::all();

        $vendedores = Vendedor::all();

        $blogs = Blog::all();

        $testimoniales = Testimonial::all();
        
        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;
        
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'blogs' => $blogs,
            'testimoniales' => $testimoniales,
            'resultado' => $resultado
        ]);
    }
    
    public static function crear(Router $router) {

             $propiedad = new Propiedad;
             $vendedores = Vendedor::all();
        
            // Arreglo con mensajes de errores.
            $errores = Propiedad::getErrores();

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
             //Crea una nueva instancia 
            $propiedad = new Propiedad($_POST['propiedad']);
        
        
             /**  SUBIDA DE ARCHIVOS */
       
            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";

            // Setear la imagen
            // Realiza un resize a la imagen con Intervention
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
  
            // Validar
            $errores = $propiedad->validar();
         
            if(empty($errores)) {
        
            // Crear la carpeta para subir imagenes
             if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            // Guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            // Guarda en la base de datos
            $propiedad->guardar();
        }
    }

    $router->render('propiedades/crear', [
        'propiedad' => $propiedad,
        'vendedores' => $vendedores,
        'errores' => $errores
    ]);
}

    public static function actualizar(Router $router) {
        
       $id = validarORedireccionar('/admin'); 
       $propiedad = Propiedad::find($id);

       $vendedores = Vendedor::all();

       $errores = Propiedad::getErrores();

       // Método POST para actualizar
       if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Asignar los atributos
        $args = $_POST['propiedad'];

        $propiedad->sincronizar($args);

        // Validación
        $errores = $propiedad->validar();

        // Subida de archivos
        // Generar un nombre único
        $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";

        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }

        if(empty($errores)) {
            // Almacenar la imagen
            if ($_FILES['propiedad']['tmp_name']['imagen']){
            $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
            $propiedad->guardar();
        }
    }

       $router->render('propiedades/actualizar', [
          'propiedad' => $propiedad,
          'vendedores' => $vendedores,
          'errores' => $errores 
       ]);
    }


    public static function eliminar () {
        
            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Validar Id
                $id = $_POST['id'];
                $id = filter_var($id , FILTER_VALIDATE_INT);
                 
                if($id) {
                    $tipo = $_POST['tipo'];
                    if(validarTipoContenido($tipo)) {
                         // Obtener los datos de la propiedad
                        $propiedad = Propiedad::find($id);
                        $propiedad->eliminar();
                    }
                }
             }
        }
}