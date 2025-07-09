<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// $routes->get('/', 'PendaftaranController::index');
$routes->post('/pendaftaran/simpan', 'PendaftaranController::simpan');


$routes->get('/login', 'AuthController::loginForm');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');


$routes->get('/dashboard-peserta', 'PesertaController::index');
$routes->post('/dashboard-peserta/upload-bukti', 'PesertaController::uploadBukti');
$routes->get('/dashboard-peserta/edit', 'PesertaController::edit');
$routes->post('/dashboard-peserta/update-data', 'PesertaController::updateData');



$routes->get('/dashboard-admin', 'AdminController::index');
$routes->get('/admin/konfirmasi-peserta', 'AdminController::konfirmasiPeserta');
$routes->get('/admin/konfirmasi-peserta/konfirmasi/(:num)', 'AdminController::konfirmasi/$1');
$routes->get('/admin/konfirmasi-peserta/tolak/(:num)', 'AdminController::tolak/$1');

