<?php

use Fixbu\Assignment\Controllers\Client\HomeController;
use Fixbu\Assignment\Controllers\Client\LoginController;
use Fixbu\Assignment\Controllers\Client\RegisterController;

$router->get('/', HomeController::class . "@index");
$router->get('/detail/{id}', HomeController::class . "@detail");
$router->get('/list', HomeController::class . "@list");

$router->get('/login', LoginController::class . "@showFormLogin");
$router->post('/handle-login', LoginController::class . "@login");
$router->get('/logout', LoginController::class . "@logout");

$router->get('/register', RegisterController::class . "@showFormRegister");
$router->post('/handle-register', RegisterController::class . "@register");