<?php 

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login( Router $router ) {
        
        $alertas  = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $auth = new Admin($_POST);

            $alertas  = $auth->validar();

            if(empty($alertas )) {
                // Verificar si el usuario existe
                 $resultado = $auth->existeUsuario();

                 if(!$resultado) {
                     // Verificar si el usuario existe o no (mensaje de error)
                    $alertas  = Admin::getalertas();
                 } else {
                    // Verificar el password
                    $autenticado = $auth->comprobarPassword($resultado);

                    if($autenticado) {
                    // Autenticar al usuario
                    $auth->autenticar();
                    } else {
                      // Password incorrecto (mensaje de error)
                      $alertas  = Admin::getalertas();
                    }
                 }

            }

        }

        $router->render('auth/login', [
            'alertas' => $alertas 
        ]);
    }

    public static function logout() {
        
        session_start();

        $_SESSION = [];

       header('Location: /');
    }
}