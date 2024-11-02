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
$routes->get('/profile', 'ProfileController::index');
$routes->get('pendaftaran', 'PendaftaranController::index');
$routes->post('pendaftaran/store', 'PendaftaranController::store');
$routes->post('pendaftaran/search', 'PendaftaranController::search');
$routes->get('/produk', 'produkController::index');
$routes->get('/add_produk', 'produkController::add_produk');
$routes->post('/produk/search', 'produkController::search');
$routes->post('/produk/store', 'produkController::store');
$routes->get('/transaksi', 'TransaksiController::index');
$routes->post('/transaksi/search', 'TransaksiController::search');
$routes->get('/add_transaksi', 'TransaksiController::add_transaksi');
$routes->post('/transaksi/store', 'TransaksiController::store');
$routes->delete('produk/delete/(:num)', 'produkController::delete/$1');
$routes->get('produk/edit/(:num)', 'produkController::edit/$1');
$routes->post('produk/update/(:num)', 'produkController::update/$1');
$routes->delete('transaksi/delete/(:num)', 'TransaksiController::delete/$1');
$routes->get('transaksi/edit/(:num)', 'TransaksiController::edit/$1');
$routes->post('transaksi/update/(:num)', 'TransaksiController::update/$1');
