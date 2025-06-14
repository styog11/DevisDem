<?php

require_once '../app/core/Router.php';
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/ClientController.php';

$router = new Router();

// Home routes
$router->get('/', [HomeController::class, 'index']);
$router->get('/home', [HomeController::class, 'index']);

// Client routes
$router->get('/clients', [ClientController::class, 'index']);
$router->get('/clients/create', [ClientController::class, 'create']);
$router->post('/clients', [ClientController::class, 'store']);
$router->get('/clients/{id}/edit', [ClientController::class, 'edit']);
$router->put('/clients/{id}', [ClientController::class, 'update']);
$router->delete('/clients/{id}', [ClientController::class, 'delete']);

// API routes for mobile app
$router->get('/api/clients', [ClientController::class, 'apiIndex']);
$router->post('/api/clients', [ClientController::class, 'apiStore']);
$router->get('/api/clients/{id}', [ClientController::class, 'apiShow']);
$router->put('/api/clients/{id}', [ClientController::class, 'apiUpdate']);
$router->delete('/api/clients/{id}', [ClientController::class, 'apiDelete']);

return $router;
?>