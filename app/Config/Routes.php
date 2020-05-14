<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/admin', 'LoginController::index');
$routes->get('/', 'Home::index');

$routes->get('/admin/home', 'AdminController::index');

$routes->get('/admin/kategori', 'KategoriController::index');
$routes->post('/admin/kategori/insert', 'KategoriController::insert');
$routes->post('/admin/kategori/delete', 'KategoriController::delete');
$routes->post('/admin/kategori/update', 'KategoriController::update');

$routes->get('/admin/setting', 'SettingController::index');
$routes->post('/admin/setting/setPrinter', 'SettingController::setPrinter');
$routes->post('/admin/setting/setToko', 'SettingController::setToko');

$routes->get('/admin/barang', 'BarangController::index');
$routes->post('/admin/barang/insert', 'BarangController::insert');
$routes->post('/admin/barang/delete', 'BarangController::delete');
$routes->post('/admin/barang/update', 'BarangController::update');

$routes->get('/admin/pegawai', 'PegawaiController::index');
$routes->post('/admin/pegawai/insert', 'PegawaiController::insert');
$routes->post('/admin/pegawai/delete', 'PegawaiController::delete');
$routes->post('/admin/pegawai/update', 'PegawaiController::update');

$routes->post('/login', 'LoginController::login');
$routes->post('/loginPegawai', 'LoginController::loginPegawai');
$routes->get('/logout', 'LoginController::logout');

$routes->post('/transaksi/print', 'TransaksiController::print');
$routes->post('/transaksi/save', 'TransaksiController::insertTransaksi');
$routes->get('/transaksi', 'TransaksiController::index');
$routes->get('/transaksi/getBarang/(:any)', 'TransaksiController::getBarang/$1');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
