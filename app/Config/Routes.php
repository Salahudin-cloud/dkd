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
// backend page : kategori tambah 
$routes->get('/kategori_tambah', 'KategoriTambahAdmin::index');
// backend proces : kategori tambah 
$routes->post('/kategori_tambah_process', 'KategoriTambahAdmin::processTambahKategori');
// backend page : kategori update 
$routes->get('/kategori_update/(:any)', 'KategoriUpdateAdmin::index/$1');
// backend process : kategori update 
$routes->put('kategori_update_process/(:any)', 'KategoriUpdateAdmin::processUpdateKategori/$1');
// backend process : delete kategori 
$routes->delete('kategori_delete/(:any)', 'KategoriAdmin::delKategori/$1');

// backend : artikel 
$routes->get('/artikel', 'ArtikelAdmin::index');
// backend : artikel tambah 
$routes->get('/artikel_tambah', 'ArtikelTambahAdmin::index');
// backend : artikel tambah process 
$routes->post('/artikel_tambah_process', 'ArtikelTambahAdmin::processTambah');
//backend : artikel update 
$routes->get('artikel_update/(:any)', 'ArtikelUpdateAdmin::index/$1');
// backend : artikel update  process 
$routes->put('artikel_update_process/(:any)', 'ArtikelUpdateAdmin::processUpdate/$1');
//backend : artikel delete process 
$routes->delete('artikel_delete/(:any)', 'ArtikelDeleteAdmin::deleteArtikel/$1');


// backend : program 
$routes->get('/programs', 'ProgramAdmin::index');
//backend : program tambah 
$routes->get('programs_tambah', 'ProgramTambahAdmin::index');
// backend : program tambah process 
$routes->post('programs_tambah_process', 'ProgramTambahAdmin::processTambah');
// backend : program update 
$routes->get('programs_update/(:any)', 'ProgramUpdateAdmin::index/$1');
//backend : program update process 
$routes->put('programs_update/(:any)', 'ProgramUpdateAdmin::updateProgramProcess/$1');
//backend : program delete process
$routes->delete('programs_delete/(:any)', 'ProgramDeleteAdmin::deleteProgramAdmin/$1');




// backend : logout 
$routes->get('logout', 'LogoutAdmin::index');
