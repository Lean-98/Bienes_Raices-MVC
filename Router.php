<?php

namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url , $fn) {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url , $fn) {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {

        session_start();
        $auth = $_SESSION['login']  ?? null;

        // Arreglo de rutas protegidas...
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar', '/blogs/crear', '/blogs/actualizar', '/blogs/eliminar', '/testimoniales/crear', '/testimoniales/actualizar', '/testimoniales/eliminar'];

        $urlActual = ($_SERVER['REQUEST_URI'] === '') ? '/' : $_SERVER['REQUEST_URI'] ;
        $metodo = $_SERVER['REQUEST_METHOD'];

        $splitURL = explode('?', $urlActual);

        //debuguear($splitURL);

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$splitURL[0]] ?? null; //$splitURL[0] contiene la URL sin variables 
        } else {
          $fn = $this->rutasPOST[$splitURL[0]] ?? null;
        }
          
    //    if($metodo === 'GET') {
    //     $fn = $this->rutasGET[$urlActual] ?? null;
    //    } else {
    //     $fn = $this->rutasPOST[$urlActual] ?? null;    
    //    }

       // Proteger las rutas
       if(in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /');
       }
        
       if($fn) {
           // La URL existe y hay una función asociada
           call_user_func($fn, $this);
       } else {
           echo "Página No encontrada!";
       }
    }

    // Muestra una Vista
    public function render($view, $datos = [] ) {
        
        foreach($datos as $key => $value) {
            $$key = $value; // $$ significa variable de variable
        }

        ob_start(); // Almacenamiento en memoria durante un momento...
        
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
        include __DIR__ . "/views/layout.php";
    }
}