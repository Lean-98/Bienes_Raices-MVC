<?php

namespace Controllers;

use Model\Blog;
use MVC\Router;
use Model\Propiedad;
use Model\Testimonial;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
  public static function index( Router $router ) {
      
    $propiedades = Propiedad::get(3);
    $blogs = Blog::get(2);
    $testimoniales = Testimonial::get(1);
    $inicio = true;
    
    $router->render('paginas/index', [
        'propiedades' => $propiedades,
        'blogs' => $blogs,
        'testimoniales' => $testimoniales,
        'inicio' => $inicio
      ]);
  }


  public static function nosotros( Router $router ) {
    
    $router->render('paginas/nosotros');

  }
  
  public static function propiedades( Router $router ) {

    $propiedades = propiedad::get(9);

    $router->render('paginas/propiedades', [
      'propiedades' => $propiedades
    ]);

  }  

  public static function propiedad( Router $router ) {
    
    $id = validarORedireccionar('/propiedades');

    // Buscar la propiedad por su ID
    $propiedad = propiedad::find($id);

    $router->render('paginas/propiedad', [
      'propiedad' => $propiedad
    ]);
  } 
  
  public static function blog( Router $router ) {
    
    $blogs = Blog::all();

    $router->render('paginas/blog', [
      'blogs' => $blogs
    ]);
  }
  
  public static function entrada( Router $router ) {
    
    $id = validarORedireccionar('/blog');

    // Obtener datos del Blog
    $blog = Blog::find($id);

    $router->render('paginas/entrada', [
      'blog' => $blog
    ]);
  }  

  public static function contacto( Router $router ) {
    
      $mensaje = null;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      
        $respuestas = $_POST['contacto'];

      // Crear un instancia de PHPMailer
      $mail = new PHPMailer();

      // Configurar SMTP
      $mail->isSMTP();
      $mail->Host = $_ENV['EMAIL_HOST'];
      $mail->SMTPAuth = true;
      $mail->Username = $_ENV['EMAIL_USER'];
      $mail->Password = $_ENV['EMAIL_PASSWORD'];
      $mail->SMTPSecure = 'tls';
      $mail->Port = $_ENV['EMAIL_PORT'];

      // Configurar el contenido del mail
      $mail->setFrom('admin@bienesraices.com');
      $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
      $mail->Subject = 'Tienes un Nuevo Mensaje!';

      // Habilitar HTML
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';

      // Definir el contenido
      $contenido = '<html>';
      $contenido .= '<p>Bienes Raices: Datos Cliente/Vendedor </p>';
      $contenido .= '<p>Nombre: ' . $respuestas['nombre']  . ' </p>';

      // Enviar de forma condicional algunos campos de email o teléfono
      if($respuestas['contacto'] === 'telefono') {
        $contenido .= '<p>Eligió ser contactado/a por Teléfono:</p>';
        $contenido .= '<p>Teléfono: ' . $respuestas['telefono']  . ' </p>';
        $contenido .= '<p>Fecha contacto: ' . $respuestas['fecha']  . ' </p>';
        $contenido .= '<p>Hora: ' . $respuestas['hora']  . ' </p>';
      } elseif ($respuestas['contacto'] === 'email') {
        $contenido .= '<p>Eligió ser contactado/a por Email:</p>';
        $contenido .= '<p>Email: ' . $respuestas['email']  . ' </p>';
      }
      
      $contenido .= '<p>Mensaje: ' . $respuestas['mensaje']  . ' </p>';
      $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo']  . ' </p>';
      $contenido .= '<p>Precio o Presupuesto: €' . $respuestas['precio']  . ' </p>';
      $contenido .= '</html>';

      $mail->Body = $contenido;
      $mail->AltBody = 'Esto es texto alternativo sin HTML';

      // Enviar el email
      if($mail->send()) {
        $mensaje = "Mensaje Enviado Correctamente!";
        // Redireccionar al login
        header('Refresh: 6; url= /');
      } else {
        $mensaje = "El mensaje no se pudo enviar!";
      }

    }

    $router->render('paginas/contacto', [
      'mensaje' => $mensaje
    ]);
  }  

}