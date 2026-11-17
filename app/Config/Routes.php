<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'AuthController::login');
$routes->get('login', 'AuthController::login');
$routes->post('auth/login', 'AuthController::loginProcess');
$routes->get('logout', 'AuthController::logout');

$routes->group('', ['filter' => 'role:Super Admin, Gudang, Teknisi'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('products', 'ProductController::index');
    $routes->get('suppliers', 'SupplierController::index');
});

$routes->group('products', ['filter' => 'role:Super Admin, Gudang'], function($routes) {
    $routes->get('create', 'ProductController::create');
    $routes->post('/', 'ProductController::store');
    $routes->get('edit/(:num)', 'ProductController::edit/$1');
    $routes->post('update/(:num)', 'ProductController::update/$1');
    $routes->delete('delete/(:num)', 'ProductController::delete/$1');
});

$routes->group('suppliers', ['filter' => 'role:Super Admin, Gudang'], function($routes) {
    $routes->get('create', 'SupplierController::create');
    $routes->post('/', 'SupplierController::store');
    $routes->get('edit/(:num)', 'SupplierController::edit/$1');
    $routes->post('update/(:num)', 'SupplierController::update/$1');
    $routes->delete('delete/(:num)', 'SupplierController::delete/$1');
});