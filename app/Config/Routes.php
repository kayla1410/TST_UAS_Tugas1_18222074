<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Authentication routes
$routes->get('/login', 'Auth::loginView');
$routes->post('/login', 'Auth::login');
$routes->get('/signup', 'Auth::signupView');
$routes->post('/signup', 'Auth::signup');
$routes->get('/logout', 'Auth::logout');

// Routes untuk Mahasiswa
$routes->group('mahasiswa', function ($routes) {
    $routes->get('profil/(:num)', 'Mahasiswa\ProfilController::index/$1');
});

// Routes untuk Admin
$routes->group('admin', function ($routes) {
    $routes->get('input-mahasiswa', 'AdminController::inputMahasiswaView');
    $routes->get('input-dosen', 'AdminController::inputDosenView');
    $routes->post('simpan-mahasiswa', 'AdminController::simpanMahasiswa');
    $routes->post('simpan-dosen', 'AdminController::simpanDosen');
    $routes->delete('delete-mahasiswa/(:num)', 'AdminController::deleteMahasiswa/$1');
    $routes->delete('delete-dosen/(:num)', 'AdminController::deleteDosen/$1');   
    $routes->get('input-nilai', 'AdminController::inputNilai');
    $routes->post('simpan-nilai', 'AdminController::simpanNilai'); 
});

$routes->get('/dashboard/mahasiswa', 'Dashboard::mahasiswa');
$routes->get('/dashboard/admin', 'Dashboard::admin');