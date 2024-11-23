<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->setAutoRoute(true);
$routes->get('/', 'Pages::index');


$routes->get('/pages', 'Pages::index');
$routes->get('/pages/about', 'Pages::about');
$routes->get('/pages/contact', 'Pages::contact');

$routes->get('/author', 'Author::index');
$routes->post('/author', 'Author::index');
$routes->get('/author/create', 'Author::create');
$routes->post('/author/save', 'Author::save');

// $routes->get('/author/delete', 'Author::delete');


$routes->delete('/author/(:segment)','Author::delete/$1');
$routes->get('/author/edit/(:segment)', 'Author::edit/$1');
$routes->post('/author/update/(:segment)', 'Author::update/$1');