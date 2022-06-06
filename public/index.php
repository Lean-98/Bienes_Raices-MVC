<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;
use Controllers\BlogController;
use Controllers\LoginController;
use Controllers\TestimonialController;

$router = new Router();

// Zona Privada
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

$router->get('/blogs/crear', [BlogController::class, 'crear']);
$router->post('/blogs/crear', [BlogController::class, 'crear']);
$router->get('/blogs/actualizar', [BlogController::class, 'actualizar']);
$router->post('/blogs/actualizar', [BlogController::class, 'actualizar']);
$router->post('/blogs/eliminar', [BlogController::class, 'eliminar']);

$router->get('/testimoniales/crear', [TestimonialController::class, 'crear']);
$router->post('/testimoniales/crear', [TestimonialController::class, 'crear']);
$router->get('/testimoniales/actualizar', [TestimonialController::class, 'actualizar']);
$router->post('/testimoniales/actualizar', [TestimonialController::class, 'actualizar']);
$router->post('/testimoniales/eliminar', [TestimonialController::class, 'eliminar']);

// Zona Pública
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

// Login y Autentication
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();