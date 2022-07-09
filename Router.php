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
        //$auth = $_SESSION['login']  ?? null;

        // Arreglo de rutas protegidas...
        //$rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar', '/blogs/crear', '/blogs/actualizar', '/blogs/eliminar', '/testimoniales/crear', '/testimoniales/actualizar', '/testimoniales/eliminar'];


        if (isset($_SERVER['PATH_INFO'])) {
            $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        } else {
            $currentUrl = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        }
        
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->rutasGET[$currentUrl] ?? null;
        } else {
            $fn = $this->rutasPOST[$currentUrl] ?? null;
        }


        // // Proteger las rutas
        // if(in_array($currentUrl, $rutas_protegidas) && !$auth) {
        //      header('Location: /');
        // }
        
        
       if($fn) {
           // La URL existe y hay una función asociada
           call_user_func($fn, $this);
       } else {
           echo "Página No Encontrada o Ruta No Válida!";
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
