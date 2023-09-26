<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// frontend
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::aboutView');
$routes->get('/program', 'Home::programView');
