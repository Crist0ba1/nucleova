<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/enviarCorreo', 'Home::enviarCorreo');

$routes->get('/invitado', 'InvitadoController::invitado');

$routes->get('/lostPassword', 'Home::lostPassword');
$routes->post('/lostPasswordForm', 'Home::lostPasswordForm');

$routes->get('/login', 'Ussers::login');
$routes->POST('/iniciarSession', 'Ussers::iniciarSession');

$routes->get('/registrar', 'Home::register');
$routes->POST('/registerUsser', 'Home::registerUsser');

$routes->get('/suscripcion', 'Home::suscripcion');

$routes->POST('/registerUsserAdmin', 'Ussers::registerUsserAdmin');
$routes->get('/agregarUsuario', 'Ussers::agregarUsuario');
$routes->get('/daleteUsuario', 'Ussers::daleteUsuario');
$routes->post('/deleteUsser', 'Ussers::deleteUsser');

$routes->get('/dashbordAdmin', 'Ussers::dashbordAdmin');
$routes->get('/dashbordProveedor', 'Ussers::dashbordProveedor');
$routes->POST('/cambiar_ubicacion', 'Ussers::cambiar_ubicacion');
$routes->POST('/cambiar_contacto', 'Ussers::cambiar_contacto');
$routes->POST('/cambiar_texto', 'Ussers::cambiar_texto');

$routes->get('/dashbordCliente', 'Ussers::dashbordCliente');
$routes->get('/dashbordInvitado', 'Ussers::dashbordInvitado');
$routes->get('/logout', 'Ussers::logout');

/*Manejo de tabla de usuarios para el admin*/
$routes->post('/usser_fetch_all', 'Ussers::usser_fetch_all');
$routes->post('/deleteUsser', 'Ussers::deleteUsser');

$routes->get('/subCategoria/(:any)/', 'CategoriasController::subCategoria/$1');
$routes->get('/postFiltros', 'home::postFiltros');
$routes->get('/proveedor/(:any)', 'CategoriasController::proveedor/$1');
$routes->get('/filtro', 'CategoriasController::filtro');

$routes->get('/pasareladepago', 'Ussers::crearTransaccion');

/* webpay*/
$routes->match(['get','post'],'/Ussers/respuesta', 'Ussers::respuesta');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
