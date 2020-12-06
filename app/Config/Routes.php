<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/admin', 'Admin::index', ['filter' => 'adminauth']);
$routes->match(['get', 'post'], '/auth', 'Auth::login', ['filter' => 'adminnoauth']);
$routes->match(['get', 'post'], '/resturant', 'Admin::resturant', ['filter' => 'adminauth']);
$routes->match(['get', 'post'], '/menu', 'Admin::menu', ['filter' => 'adminauth']);
$routes->get('/list', 'Admin::list', ['filter' => 'adminauth']);
$routes->match(['get', 'post'], '/edit/resturant/(:num)', 'Admin::resedit/$1', ['filter' => 'adminauth']);
$routes->match(['get', 'post'], '/delete/resturant/(:num)', 'Admin::resdelete/$1', ['filter' => 'adminauth']);
$routes->match(['get', 'post'], '/delete/item/(:num)', 'Admin::delitem/$1', ['filter' => 'adminauth']);
$routes->match(['get', 'post'], '/edit/menu/(:num)', 'Admin::menuedit/$1', ['filter' => 'adminauth']);
$routes->match(['get', 'post'], '/edit/item/(:num)', 'Admin::itemedit/$1', ['filter' => 'adminauth']);
$routes->match(['get', 'post'], '/delete/menu/(:num)', 'Admin::menudelete/$1', ['filter' => 'adminauth']);
$routes->match(['get', 'post'], '/edit/update/(:num)', 'Admin::order/$1', ['filter' => 'adminauth']);
$routes->match(['get', 'post'], '/add/menu/(:num)', 'Admin::menuitem/$1', ['filter' => 'adminauth']);
$routes->get('/resturant/profile/(:num)', 'Home::profile/$1');
$routes->get('/cart/buy/(:num)', 'Cart::buy/$1');
$routes->get('/cart/remove/(:num)', 'Cart::remove/$1');
$routes->match(['get', 'post'], '/result', 'Home::result');
$routes->match(['get', 'post'], '/food', 'Home::food');
$routes->match(['get', 'post'], '/register', 'User::register', ['filter' => 'noauth']);
$routes->match(['get', 'post'], '/login', 'User::index', ['filter' => 'noauth']);
$routes->match(['get', 'post'], '/dashboard', 'User::dashboard', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/checkout?(:any)', 'Cart::checkout/$1', ['filter' => 'auth']);









/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
