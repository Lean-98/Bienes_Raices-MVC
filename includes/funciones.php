<?php 

define('TEMPLATE_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');


function incluirTemplates ( string $nombre, bool $inicio = false ) {
    include TEMPLATE_URL. "/{$nombre}.php";
}

function limitar_cadena($cadena, $limite, $sufijo){
    // Si la longitud es mayor que el límite...
    if(strlen($cadena) > $limite){
        // Entonces corta la cadena y ponle el sufijo
        return substr($cadena, 0, $limite) . $sufijo;
    }
    
    // Si no, entonces devuelve la cadena normal
    return $cadena;
}

function estadoAutenticado() {
    session_start();
    
    if(!$_SESSION['login']) {
        header('Location: /');
    } 
}

function  debuguear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa- Sanatizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

// Validar tipo de Contenido
function validarTipoContenido($tipo) {
    $tipos = ['vendedor', 'propiedad', 'blog', 'testimonial'];
    return in_array($tipo, $tipos);
}

function validarORedireccionar(string $url) {
 // Validar la URL por un ID válido INT
 $id = $_GET['id'];
 $id = filter_var($id, FILTER_VALIDATE_INT);

 if(!$id) {
     header("Location: {$url}");
 }

 return $id;
}

// function isAdmin() : void {
//     if(!isset($_SESSION['admin'])) {
//         header('Location: /');
//     }
// }

function iniciaSesion() {
    if(!isset($_SESSION)) {
        session_start();
    }
}