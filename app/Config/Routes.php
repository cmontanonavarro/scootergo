<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// HOME
$routes->get('/', 'Home::index');

// LOGIN
$routes->get('login', 'login_controller::mostrarLoginForm');
$routes->post('login/autenticar', 'login_controller::autenticar');