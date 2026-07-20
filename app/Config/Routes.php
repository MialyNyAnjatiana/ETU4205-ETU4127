<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UtilisateurController::login');
$routes->get('/login', 'UtilisateurController::login');
$routes->post('/login', 'UtilisateurController::connexion');

$routes->get('/client/dashboard', 'UtilisateurController::dashboard');
$routes->get('/admin/dashboard', 'AdminController::index');
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

$routes->get('/admin', 'AdminController::index');