<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->get('/login', 'AuthController::index');
$routes->post('/login/auth', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');
//settings menu
    $routes->get('/settings', 'Settings::index');
$routes->post('/settings/updateProfile', 'Settings::updateProfile');
$routes->get('/settings/backupDB', 'Settings::backupDB');


$routes->group('', ['filter' => 'authGuard'], function($routes) {
    $routes->get('/dashboard', 'Dashboard::index');

    $routes->get('/mahasiswa', 'Mahasiswa::index');         
    $routes->get('/mahasiswa/create', 'Mahasiswa::create'); 
    $routes->post('/mahasiswa/store', 'Mahasiswa::store');  
    $routes->get('/mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1'); 
    $routes->get('/mahasiswa/printKTM/(:num)', 'Mahasiswa::printKTM/$1');

$routes->get('/mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');    
$routes->post('/mahasiswa/update/(:num)', 'Mahasiswa::update/$1'); 
$routes->get('/profile', 'AuthController::profile');
    $routes->post('/profile/update', 'AuthController::updateProfile');
    
});