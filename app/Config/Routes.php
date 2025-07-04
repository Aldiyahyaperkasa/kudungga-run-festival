<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('/pendaftaran/simpan', 'PendaftaranController::simpan');


$routes->get('login/', 'LoginController::index');