<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'home::index');
$routes->get('/welcome','home::contacto');
$routes->get('terminos', 'Terminos::index');
$routes->get('quienes_somos', 'Quienes::index');
$routes->get('contacto', 'Contacto::index');
$routes->get('compras', 'Compras::index');
$routes->post('/contacto/enviar', 'Contacto::enviar');

//$routes->get('productos', 'ProductosController::index');

$routes->get('carrito/agregar/(:num)', 'CarritoController::agregar/$1');
$routes->get('carrito', 'CarritoController::ver');
$routes->get('catalogo', 'CatalogoController::index');
$routes->get('catalogo/(:num)', 'CatalogoController::categoria/$1');

//ruta para el login
$routes->get('Login','Login::index');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('logout', 'Login::logout');
$routes->post('register/save', 'Register::save');

//falta implementar esto
$routes->get('admin','Admin::index');

/////
$routes->post('carrito/aumentar/(:num)', 'CarritoController::aumentar/$1');
$routes->post('carrito/disminuir/(:num)', 'CarritoController::disminuir/$1');
$routes->post('carrito/eliminar/(:num)', 'CarritoController::eliminar/$1');
$routes->get('carrito', 'CarritoController::ver');


///probando lo de comprar ahora button
$routes->get('checkout', 'CheckoutController::index');
$routes->post('checkout/procesar', 'CheckoutController::procesar');
$routes->get('gracias', 'CheckoutController::gracias');

/*El usuario ve el carrito y puede hacer clic en "Comprar ahora".

Se abre el formulario de checkout para ingresar datos.

Se valida y procesa la compra (aquí solo vaciamos el carrito).

Se muestra una página de agradecimiento.

Puedes ampliar el proceso para guardar la orden en base de datos y conectar con pasarelas de pago. */

$routes->get('mercadopago', 'MercadoPagoController::crearPreferencia');
