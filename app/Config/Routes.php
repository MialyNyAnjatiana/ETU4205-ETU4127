<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UtilisateurController::login');
$routes->get('/login', 'UtilisateurController::login');
$routes->post('/login', 'UtilisateurController::connexion');

$routes->get('/client/dashboard', 'UtilisateurController::dashboard');
$routes->get('/client/solde', 'UtilisateurController::voirSolde');

$routes->get('/client/depot', 'UtilisateurController::depot');
$routes->post('/client/depot', 'UtilisateurController::depot');

$routes->get('/client/retrait', 'UtilisateurController::retrait');
$routes->post('/client/retrait', 'UtilisateurController::retrait');

$routes->get('/client/transfert', 'UtilisateurController::transfert');
$routes->post('/client/transfert', 'UtilisateurController::transfert');

$routes->get('/client/historique', 'UtilisateurController::historique');
$routes->get('/logout', 'UtilisateurController::logout');
$routes->get('/login', 'Home::viewLogin');
$routes->post('/login', 'Auth::login');

$routes->get('/admin/dashboard', 'AdminController::index');

$routes->get('/admin/prefixes', 'PrefixeController::index');
$routes->post('/admin/prefixes/add', 'PrefixeController::add');
$routes->post('/admin/prefixes/update/(:num)', 'PrefixeController::update/$1');
$routes->get('/admin/prefixes/delete/(:num)', 'PrefixeController::delete/$1');

$routes->get('/admin/operations', 'OperationController::index');

$routes->post('/admin/frais/add', 'FraisController::add');
$routes->post('/admin/frais/update/(:num)', 'FraisController::update/$1');
$routes->get('/admin/frais/delete/(:num)', 'FraisController::delete/$1');

$routes->get('/admin/operateurs', 'OperateurController::index');
$routes->post('/admin/operateurs/update/(:num)', 'OperateurController::update/$1');
$routes->post('/admin/operateurs/add', 'OperateurController::add');
$routes->get('/admin/operateurs/delete/(:num)', 'OperateurController::delete/$1');

$routes->post('/client/epargne', 'UtilisateurController::epargne');
$routes->get('/client/epargne', 'UtilisateurController::epargne');