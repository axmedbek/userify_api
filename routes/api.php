<?php

use Src\Controllers\V1\User\UserController;
use Src\Lib\Dispatcher;

$dispatcher = new Dispatcher($_SERVER);

$dispatcher->get('/v1/users',[
    'controller' => UserController::class,
    'method' => 'getAllUsers'
]);

$dispatcher->post('/v1/users', [
    'controller' => UserController::class,
    'method' => 'handleCreateUser'
]);


$dispatcher->put('/v1/users/{id}', [
    'controller' => UserController::class,
    'method' => 'handleUpdateUser'
]);


$dispatcher->delete('/v1/users/{id}', [
    'controller' => UserController::class,
    'method' => 'handleDeleteUser'
]);
$dispatcher->run();