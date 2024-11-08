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

// LOGIN y LOGOUT de USUARIO
$routes->get('login', 'login_controller::mostrarLoginForm');
$routes->post('login/autenticar', 'login_controller::autenticar');
$routes->get('logout', 'login_controller::logout');

// REGISTRO NUEVO USUARIO
$routes->get('registro', 'registro_controller::index');
$routes->post('registro/registrar', 'registro_controller::registrar');

// RESERVA de MOTO por USUARIO
$routes->get('reserva/(:num)', "reserva_controller::comprobacion_reserva/$1");