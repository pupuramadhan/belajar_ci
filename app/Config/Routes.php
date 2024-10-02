<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/data', 'DataController::index');
$routes->get('/login', 'LoginController::index');
$routes->get('/register', 'RegisterController::index');
$routes->post('/register', 'RegisterController::submit');
$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::authenticate');
$routes->get('logout', 'LoginController::logout');
$routes->get('pendaftaran', 'PendaftaranController::index');
$routes->post('pendaftaran/store', 'PendaftaranController::store');
$routes->post('pendaftaran/search', 'PendaftaranController::search');
$routes->get('data', 'DataController::index');
