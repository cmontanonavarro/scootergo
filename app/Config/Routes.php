<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// HOME
$routes->get('/', 'Home::index');

// VISTAS DE CATALOGO
$routes->get('/catalogo', 'catalogo_controller::catalogo');
$routes->get('/disponibles', 'catalogo_controller::disponibles');

// LOGIN y LOGOUT
$routes->get('login', 'login_controller::mostrarLoginForm');
$routes->post('login/autenticar', 'login_controller::autenticar');
$routes->get('logout', 'login_controller::logout');