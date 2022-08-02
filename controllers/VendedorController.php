<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class VendedorController {
    
    public static function crear (Router $router) {
       
        $alertas = [];

        $vendedor = new Vendedor;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
      
            // Crea una nueva instancia 
            $vendedor = new Vendedor($_POST['vendedor']);
            
            /**  SUBIDA DE ARCHIVOS */
           
            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
        
            // Setear la imagen
            // Realiza un resize a la imagen con Intervention
            if($_FILES['vendedor']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['vendedor']['tmp_name']['imagen'])->fit(800,600);
                $vendedor->setImagen($nombreImagen);
            }
            
            // Validar que no haya campos vacios
            $alertas  = $vendedor->validar();
             
            if(empty($alertas )) {
            
            // Crear la carpeta para subir imagenes
            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }
        
            // Guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);
        
            // Guarda en la base de datos
            $vendedor->guardar();
            Vendedor::setAlerta('exito', 'Vendedor Creado Correctamente!'); 
            // Redireccionar al login
            header('Refresh: 3; url= /admin');
        }
    }
        $alertas = Vendedor::getAlertas();
        $router->render('vendedores/crear', [
            'alertas' => $alertas ,
            'vendedor' => $vendedor
        ]);
    }

    public static function actualizar (Router $router) {
        
        $id = validarORedireccionar('/admin');
        
        // Obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Asignar los valores
            $args = $_POST['vendedor'];
            
            // Sincronizar objeto en memoria con lo que el usuario escribió
            $vendedor->sincronizar($args);
        
            // Validación
            $alertas  = $vendedor->validar();
        
            // Subida de archivos
            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
        
            if($_FILES['vendedor']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['vendedor']['tmp_name']['imagen'])->fit(800,600);
                $vendedor->setImagen($nombreImagen);
            }
        
            if(empty($alertas )) {
                // Almacenar la imagen
                if ($_FILES['vendedor']['tmp_name']['imagen']){
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                 }
                 $vendedor->guardar();
                 Vendedor::setAlerta('exito', 'Vendedor Actualizado Correctamente!'); 
                 // Redireccionar al login
                 header('Refresh: 3; url= /admin');             
                }
        }

             $alertas = Vendedor::getAlertas();
            $router->render('vendedores/actualizar', [
                'alertas' => $alertas ,
                'vendedor' => $vendedor

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
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                    header('Location: /admin');
                }
            }
        }      
    }
}