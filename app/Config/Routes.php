<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AdminHome::index',['filter'=>'authGuard'] );
$routes->get('/about', 'About::index');
$routes->get('/contact', 'Contact::index');
$routes->get('/products', 'Products::index');
$routes->get('/products/create', 'Products::create');
$routes->post('/products/store', 'Products::store');

$routes->get('/products/delete/(:num)', 'Products::delete/$1');
$routes->get('/products/edit/(:num)', 'Products::edit/$1');
$routes->post('/products/update/(:num)', 'Products::update/$1');

$routes->get('register', 'SignupController::index');
$routes->match(['get', 'post'], '/register/store', 'SignupController::store');
$routes->get('login', 'Signin::index');
$routes->post('login', 'Signin::login');
$routes->get('login', 'Signin::logout');





