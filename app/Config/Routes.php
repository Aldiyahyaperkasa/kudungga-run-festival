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



    $routes->get('admin/pengambilan/scan', 'PengambilanBajuController::scan');
    $routes->post('admin/pengambilan/scan', 'PengambilanBajuController::prosesScan');
    $routes->get('admin/pengambilan/manual', 'PengambilanBajuController::manual');
    $routes->post('admin/pengambilan/update/(:num)', 'PengambilanBajuController::updateManual/$1');


// Laporan
    $routes->get('LaporanController/terkonfirmasi', 'LaporanController::terkonfirmasi');
    $routes->get('LaporanController/sudahAmbilBaju', 'LaporanController::sudahAmbilBaju');
    $routes->get('LaporanController/exportPesertaTerkonfirmasiExcel', 'LaporanController::exportPesertaTerkonfirmasiExcel');
    $routes->get('LaporanController/exportSudahAmbilBajuExcel', 'LaporanController::exportSudahAmbilBajuExcel');