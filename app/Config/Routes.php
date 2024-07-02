<?php

use CodeIgniter\Router\RouteCollection;

// $routes->setAutoRoute(true); 

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/articles', 'Articles::index');
$routes->get('articles/(:num)', 'Articles::show/$1');
$routes->get('articles/new', "Articles::new", ["as" => "new_article"]);
$routes->post("articles/create", "Articles::create");
$routes->get('articles/edit/(:num)', 'Articles::edit/$1');
$routes->post('articles/update/(:num)', 'Articles::update/$1');
$routes->match(['get', 'post'],'articles/delete/(:num)', 'Articles::delete/$1');