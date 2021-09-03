<?php

use Slim\App;
use App\Controllers\AuthController;


return function (App $app) {

    $app->get('/', [AuthController::class , 'index'])->setName('home');
    $app->get('/create', [AuthController::class , 'create'])->setName('create');
};