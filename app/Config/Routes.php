<?php

use CodeIgniter\Commands\Utilities\Routes;
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
// register process
$routes->post('register/process', 'Register::registerProcess');

// frontend render page
// frontend page : index
$routes->get('/', 'Home::index');

// frontend page : tentang
$routes->get('/tentang', 'About::index');

// frontend page : program
$routes->get('/program', 'Programs::index');



// frontend page : detail program 
$routes->get('/detail_program/(:any)', 'DetailPrograms::index/$1');

// frontend page : artikel
$routes->get('/artikel', 'Artikel::index');

// frontend page : detail artikel 
$routes->get('/detail_artikel/(:any)', 'DetailArtikel::index/$1');

//frontend page : artikel cari 
$routes->get('artikel/cari', 'ArtikelCari::index/$1');

// frontend page : artikel kategori 
$routes->get('artikel/(:any)', 'ArtikelKategori::index/$1');

// frontend page : kontak
$routes->get('/kontak', 'Kontak::index');


// backend 
// backend page : dashboard
$routes->get('/dashboard', 'DashboardAdmin::index');


// backend page : users management
$routes->get('/users_management', 'UserManagementAdmin::index');
$routes->get('/tambah_pengguna', 'UserManagementTambah::index');
$routes->get('update_pengguna/(:any)', 'UserManagementUpdate::index/$1');
$routes->post('tambah_pengguna/process', 'UserManagementTambah::tambahProcessProses');
$routes->put('update_pengguna/process/(:any)', 'UserManagementUpdate::updateProces/$1');
$routes->delete('delete_pengguna/(:any)', 'UserManagementDelete::index/$1');


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
$routes->get('/artikell', 'ArtikelAdmin::index');
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


// backend page : transaksi
$routes->get('transaksi', 'Transaksi::index');
$routes->post('transaksi/check/(:any)', 'Transaksi::checkTransaksi/$1');
$routes->delete('transaksi/delete/(:any)', 'Transaksi::deleteTransaksi/$1');
$routes->get('/transaksi_tambah', 'Transaksi::tambahTransaksi');
$routes->post('/transaksi_tambah_process', 'Transaksi::tambahTransaksiProcess');


//backend page : transaksi keluar 
$routes->get('/transaksi_keluar', 'Transaksi::keluar');
$routes->post('transaksi_keluar/process', 'Transaksi::transaksiKeluarProcess');

//backend page : transaksi edit 
$routes->get('transaksi/transaksi_edit/(:any)', 'Transaksi::editTransaksi/$1');
$routes->post('transaksi/transaksi_edit/process', 'Transaksi::editTransaksiProcess');


// frontend : transaksi process
$routes->post('transaksi_process/process', 'TransaksiDonasi::index');




// backend : logout 
$routes->get('logout', 'LogoutAdmin::index');




// keuangan  menu : dashboard 
$routes->get('keuangan/dashboard', 'DashboardDirektur::index');
// keuangan menu : transaksi
$routes->get('keuangan/transaksi', 'DashboardTransaksiDirektur::index');

// keuangan menu : button donwload 
$routes->get('cetak_laporan', 'DashboardTransaksiDirektur::cetakLaporan');

$routes->post('cetak_laporan/process', 'DashboardTransaksiDirektur::cetakLaporanProcess');
