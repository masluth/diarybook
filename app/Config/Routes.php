<?php

namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

// Default settings
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Diary');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false); // Kita matikan AutoRoute demi keamanan

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// AUTH ROUTES
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::attemptRegister');
$routes->get('/logout', 'Auth::logout');

// DIARY ROUTES (protected by auth filter)
$routes->get('/', 'Diary::index', ['filter' => 'auth']);

$routes->get('/entries/create', 'Diary::create', ['filter' => 'auth']);
$routes->post('/entries/store', 'Diary::store', ['filter' => 'auth']);

$routes->get('/entries/(:num)', 'Diary::show/$1', ['filter' => 'auth']);
$routes->get('/entries/(:num)/edit', 'Diary::edit/$1', ['filter' => 'auth']);
$routes->post('/entries/(:num)/update', 'Diary::update/$1', ['filter' => 'auth']);
$routes->post('/entries/(:num)/delete', 'Diary::delete/$1', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Environment-based additional routing
 * --------------------------------------------------------------------
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
