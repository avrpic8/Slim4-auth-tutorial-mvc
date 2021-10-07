<?php

use App\Http\Middleware\AdminCheckMiddleware;
use Slim\App;
use App\Http\Controllers\HomeController;


return function (App $app) {

    $app->get('/', [HomeController::class , 'index'])
        ->addMiddleware(new AdminCheckMiddleware($app->getResponseFactory()))
        ->setName('home');
};