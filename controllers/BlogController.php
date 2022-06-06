<?php

namespace Controllers;

use MVC\Router;
use Model\Blog;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController {
    
    public static function index (Router $router) {
       
        $blogs = Blog::all();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('blogs/index', [
            'blogs' => $blogs,
            'resultado' => $resultado
        ]);
    }

    public static function crear ( Router $router ) {

        $blog = new Blog;
        $errores = Blog::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
      
            // Crea una nueva instancia 
            $blog = new Blog($_POST['blog']);
            
            /**  SUBIDA DE ARCHIVOS */
           
            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
        
            // Setear la imagen
            // Realiza un resize a la imagen con Intervention
            if($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800,600);
                $blog->setImagen($nombreImagen);
            }
            
            // Validar que no haya campos vacios
            $errores = $blog->validar();
             
            if(empty($errores)) {
            
            // Crear la carpeta para subir imagenes
            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }
        
            // Guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);
        
            // Guarda en la base de datos
            $blog->guardar();
            }
        }

        $router->render('blogs/crear', [
            'errores' => $errores,
            'blog' => $blog
        ]);
    }


    public static function actualizar (Router $router) {
        
        $id = validarORedireccionar('/blogs');
         // Obtener datos del blog a actualizar
         $blog = Blog::find($id);

         $errores = Blog::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Asignar los valores
            $args = $_POST['blog'];
            
            // Sincronizar objeto en memoria con lo que el usuario escribió
            $blog->sincronizar($args);
        
            // Validación
            $errores = $blog->validar();
        
            // Subida de archivos
            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
        
            if($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800,600);
                $blog->setImagen($nombreImagen);
            }
        
            if(empty($errores)) {
                // Almacenar la imagen
                if ($_FILES['blog']['tmp_name']['imagen']){
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                 }
                 $blog->guardar();
                }
        }

            $router->render('/blogs/actualizar', [
                'errores' => $errores,
                'blog' => $blog 
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
                        $blog = Blog::find($id);
                        $blog ->eliminar();
                    }
                }
            }      
        }

}    