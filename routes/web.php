<?php
// routes/web.php

require_once '../app/controllers/HomeController.php';

$router = new Router();

$router->get('/', [HomeController::class, 'index']);

// Add more routes as needed
?>