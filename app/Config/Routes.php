<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::viewLogin');
$routes->post('/login', 'Auth::login');

$routes->get('/admin', 'Admin::index');