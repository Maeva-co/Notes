<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// juste l'implementation de la template de base, a modifier en fonction de nos pages
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/list', 'Home::list');
$routes->get('/form', 'Home::form');


$routes->get('/students', 'StudentController::index');

$routes->get('/notes/formulaire', 'NotesController::formulaire');
$routes->post('/notes/ajouter', 'NotesController::ajouter');