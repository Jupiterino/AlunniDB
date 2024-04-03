<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/AlunniController.php';

$app = AppFactory::create();

$app->get('/', "AlunniController:index");
$app->get('/alunni', "AlunniController:index1");
$app->get('/alunni/{id}', "AlunniController:show");
$app->post('/alunni/create', "AlunniController:create");
$app->put('/alunni/update/{id}', "AlunniController:update");
$app->delete('/alunni/delete/{id}', "AlunniController:delete");

$app->run();
