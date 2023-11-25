<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// frontend render page
$routes->get('/', 'Home::index');
$routes->get('/tentang', 'About::index');
$routes->get('/program', 'Programs::index');
$routes->get('/event', 'Events::index');