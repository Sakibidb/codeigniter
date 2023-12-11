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
$routes->get('logout', 'Signin::logout');

$routes->get('/category', 'CategoryController::index'); //list
$routes->get('category/create', 'CategoryController::creat'); //entry form
$routes->post('category/store', 'CategoryController::store'); // save
$routes->get('category/edit/(:num)', 'CategoryController::edit/$1'); // edit
$routes->post('category/update/(:num)', 'CategoryController::delete/$1'); // update
$routes->get('category/delete/(:num)', 'CategoryController::update/$1'); // delete

//Frontend
$routes->get('productsall', 'frontend\ProductController::index');
$routes->post('productsall/(:num)', 'frontend\ProductController::show/$1');


