<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// HOME
$routes->get('/', 'Home::index');

// LOGIN y LOGOUT
$routes->get('login', 'login_controller::mostrarLoginForm');
$routes->post('login/autenticar', 'login_controller::autenticar');
$routes->get('logout', 'login_controller::logout');