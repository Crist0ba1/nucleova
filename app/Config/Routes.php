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


$routes->get('/lostPassword', 'Home::lostPassword',['filter' =>'noAuth']);
$routes->post('/lostPasswordForm', 'Home::lostPasswordForm',['filter' =>'noAuth']);

$routes->get('/login', 'Ussers::login',['filter' =>'noAuth']);
$routes->POST('/iniciarSession', 'Ussers::iniciarSession',['filter' =>'noAuth']);

/* Registrar persona */
$routes->get('/registrar', 'Home::register',['filter' =>'noAuth']);
$routes->POST('/registrarPersona', 'Home::registrarPersona',['filter' =>'noAuth']);

$routes->get('/registerError', 'Home::registerError'); // Envia mensaje de error, no se si se ocupa AUN
$routes->get('/perfil', 'Home::perfil',['filter' =>'Auth']);
$routes->POST('/registerUsserEmpresa', 'Ussers::registerUsserEmpresa',['filter' =>'Auth']);
$routes->POST('/editarUsserEmpresa', 'Ussers::editarUsserEmpresa',['filter' =>'Auth']);
$routes->POST('/registerUsserProveedor', 'Ussers::registerUsserProveedor',['filter' =>'Auth']);
$routes->POST('/editarUsserProveedor', 'Ussers::editarUsserProveedor',['filter' =>'Auth']);
$routes->POST('/cambiar_imagen_empresa', 'Ussers::cambiar_imagen_empresa',['filter' =>'Auth']);
$routes->POST('/cambiar_imagen_empresaN', 'Ussers::cambiar_imagen_empresaN',['filter' =>'Auth']);

$routes->POST('/registerUsserAdmin', 'Ussers::registerUsserAdmin');
$routes->get('/agregarUsuario', 'Ussers::agregarUsuario');
$routes->get('/daleteUsuario', 'Ussers::daleteUsuario');
$routes->post('/deleteUsser', 'Ussers::deleteUsser');


$routes->get('/dashbordAdmin', 'Ussers::dashbordAdmin');
$routes->get('/dashbordProveedor', 'Ussers::dashbordProveedor');
$routes->POST('/cambiar_ubicacion', 'Ussers::cambiar_ubicacion');
$routes->POST('/cambiar_contacto', 'Ussers::cambiar_contacto');
$routes->POST('/cambiar_texto', 'Ussers::cambiar_texto');




//$routes->get('/dashbordCliente', 'Ussers::dashbordCliente');
//$routes->get('/dashbordInvitado', 'Ussers::dashbordInvitado');

$routes->get('/logout', 'Ussers::logout');

/*Manejo de tabla de usuarios para el admin*/
$routes->post('/usser_fetch_all', 'Ussers::usser_fetch_all');
$routes->post('/deleteUsser', 'Ussers::deleteUsser');


$routes->get('/subCategoria/(:any)/', 'CategoriasController::subCategoria/$1');
$routes->get('/postFiltros', 'home::postFiltros');
$routes->get('/proveedor/(:any)', 'CategoriasController::proveedor/$1');
$routes->get('/empresa/(:any)', 'CategoriasController::empresa/$1');
$routes->get('/filtro', 'CategoriasController::filtro');


$routes->get('/pasareladepago1/(:any)', 'Ussers::crearTransaccion1/$1',['filter' =>'Auth']);
$routes->get('/pasareladepago2/(:any)', 'Ussers::crearTransaccion2/$1',['filter' =>'Auth']);
$routes->get('/pasareladepago3/(:any)', 'Ussers::crearTransaccion3/$1',['filter' =>'Auth']);
$routes->get('/pasareladepago4/(:any)', 'Ussers::crearTransaccion4/$1',['filter' =>'Auth']);


$routes->get('/historial', 'proController::historial');
$routes->get('/buscador', 'proController::search');

/* Empresa proo */
$routes->get('/perfilPro', 'proController::proPerfil',['filter' =>'Auth']);

$routes->get('/subCategoriaPRO/(:any)/', 'CategoriasController::subCategoriaPRO/$1');
$routes->get('/proveedorPro/(:any)', 'CategoriasController::proveedorPro/$1');
$routes->get('/filtroPRO', 'CategoriasController::filtroPRO');
$routes->get('/grupoLista/(:any)/(:any)', 'CategoriasController::grupoLista/$1/$2');
$routes->get('/enviarSolicitud/(:any)', 'proController::enviarSolicitud/$1');
$routes->get('/aceptarSolicitud/(:any)', 'proController::aceptarSolicitud/$1');
$routes->get('/cancelarSolicitud/(:any)', 'proController::cancelarSolicitud/$1');
$routes->get('/eliminarSolicitud/(:any)', 'proController::eliminarSolicitud/$1');
$routes->get('/eliminarProveedor/(:any)', 'proController::eliminarProveedor/$1');
$routes->get('/eliminarRequerimiento/(:any)','proController::eliminarRequerimiento/$1');
$routes->get('/cancelarRequerimiento/(:any)','proController::cancelarRequerimiento/$1');
$routes->get('/getNumeroEmpresa/(:any)','proController::getNumeroEmpresa/$1');// La empresa busca el numero
$routes->get('/getNumeroProvedor/(:any)','proController::getNumeroProvedor/$1');// El proveedor busca el numero
$routes->get('/getImagenesR/(:any)','proController::getImagenesR/$1');
$routes->get('/verRporteRequerimientoM/(:any)','proController::verRporteRequerimientoM/$1');


$routes->post('/nuevoRequerimiento', 'proController::nuevoRequerimiento');
$routes->post('/respuestaFecha', 'proController::respuestaFecha');
$routes->post('/reagendarFecha', 'proController::reagendarFecha');
$routes->post('/finalizarRequerimiento', 'proController::finalizarRequerimiento');
$routes->post('/finalzarRM', 'proController::finalzarRM');

/* Proveedor pro */

/* Usser que son los proveedores */ 

$routes->get('/dashborEmpresa', 'proController::dashborEmpresa');
$routes->get('/mis_clientes', 'proController::mis_clientes');
$routes->get('/solicitudes', 'proController::solicitudes');
$routes->get('/mis_requerimientos', 'proController::mis_requerimientos');

$routes->get('/solicitudesProveedor', 'proController::solicitudesProveedor');
/* Cliente que son las empresas */ 
$routes->get('/mis_proveedores', 'proController::mis_proveedores');
$routes->get('/requerimientos', 'proController::requerimientos');



/*Informacion de un proveedor de servicios especifico*/
$routes->get('/pasareladepago/(:any)', 'Ussers::crearTransaccion/$1');
$routes->get('/suscripcion', 'proController::suscripcion');
//$routes->get('/suscripcion', 'Home::suscripcion');
$routes->get('/verplanes', 'proController::verplanes');

/* webpay*/
$routes->match(['get','post'],'/respuesta', 'Ussers::respuesta');
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
