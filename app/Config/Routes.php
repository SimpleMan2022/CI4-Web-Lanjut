<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/fungsi', 'Home::fungsi1');
$routes->get('/tampil/(:any)', 'Home::tampilNama/$1');
$routes->get('/about', 'AboutController::index');
$routes->get('/page/paramany/(:any)', 'Page::tampilParameter/$1');
$routes->get('/page/umur/(:num)', 'Page::tampilUmur/$1');

// mahasiswa
$routes->get('/page/mahasiswa', 'Page::mahasiswa');
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->post('/mahasiswa/store', 'Mahasiswa::store');
$routes->post('/mahasiswa/update', 'Mahasiswa::update');
$routes->post('/mahasiswa/delete', 'Mahasiswa::delete');

// prodi
$routes->get('/prodi', 'Prodi::index');
$routes->post('/prodi/store', 'Prodi::store');

// jurusan
$routes->get('/jurusan', 'Jurusan::index');
$routes->post('/jurusan/store', 'Jurusan::store');

// dosen
$routes->get('/page/dosen', 'Page::dosen');

// matkul
$routes->get('/page/matakuliah', 'Page::matakuliah');
