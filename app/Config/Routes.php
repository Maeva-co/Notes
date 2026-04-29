<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// juste l'implementation de la template de base, a modifier en fonction de nos pages
$routes->get('/', 'LoginController::index');
$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::authenticate');
$routes->get('/logout', 'LoginController::logout');

$routes->group('', ['filter' => 'auth'], static function ($routes) {
	$routes->get('/dashboard', 'Home::dashboard');
	$routes->get('/list', 'Home::list');
	$routes->get('/form', 'Home::form');
	$routes->get('/students', 'StudentController::index');
});
