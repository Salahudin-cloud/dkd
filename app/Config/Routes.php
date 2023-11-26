<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// frontend render page

$routes->get('/', 'Home::index');


$routes->get('/tentang', 'About::index');


$routes->get('/program', 'Programs::index');
$routes->get('/detail_program', 'Programs::detailProgram');

$routes->get('/event', 'Events::index');
$routes->get('/detail_event', 'Events::detailEvents');


$routes->get('/blog', 'Blog::index');
$routes->get('/detail_blog', 'Blog::detailBlog');

$routes->get('/kontak', 'Kontak::index');
