<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// Login 

$routes->get('/login', 'Login::index');
// validasi pengguna 
$routes->post('/auth', 'Login::validasi');

// register 
$routes->get('/register', 'Register::index');

// frontend render page
// frontend page : index
$routes->get('/', 'Home::index');

// frontend page : tentang
$routes->get('/tentang', 'About::index');

// frontend page : program
$routes->get('/program', 'Programs::index');

// frontend page : detail program 
$routes->get('/detail_program', 'DetailPrograms::index');

// frontend page : events  
$routes->get('/event', 'Events::index');

// frontend page : detail events 
$routes->get('/detail_event', 'DetailEvents::index');

// frontend page : blog
$routes->get('/blog', 'Blog::index');

// frontend page : detail blog 
$routes->get('/detail_blog', 'DetailBlog::index');

// // frontend page : kontak
$routes->get('/kontak', 'Kontak::index');


// backend 
// backend page : dashboard
$routes->get('/dashboard', 'DashboardAdmin::index');


// backend page : users management
$routes->get('/users_management', 'UserManagementAdmin::index');
$routes->get('/tambah_pengguna', 'UserManagementAdmin::tambahPenggunaView');

// backend page : kategori
$routes->get('/kategori', 'KategoriAdmin::index');
