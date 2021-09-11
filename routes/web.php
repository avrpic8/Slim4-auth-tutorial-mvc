<?php

use Slim\App;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


return function (App $app) {

    $app->get('/', [AuthController::class , 'index']);
    $app->get('/create', [AuthController::class , 'create'])->setName('create');
    $app->get('/users/{id}', [HomeController::class , 'index'])->setName('home');
};