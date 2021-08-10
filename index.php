<?php

define('BASE_URL', 'http://localhost/CRUD');
date_default_timezone_set('America/Sao_Paulo');
require __DIR__ . "/vendor/autoload.php";

$app = new \Slim\App();
$app->get('/', 'Source\Controllers\DesenvController:home');
$app->get('/register', 'Source\Controllers\DesenvController:register');
$app->get('/update/{id}', 'Source\Controllers\DesenvController:update');
$app->get('/list', 'Source\Controllers\DesenvController:list');
$app->post('/register', 'Source\Controllers\DesenvController:save');
$app->delete('/delete/{id}', 'Source\Controllers\DesenvController:delete');
$app->run();