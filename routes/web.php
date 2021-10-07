<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\AdminCheckMiddleware;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;


return function (App $app) {

    //// ================ Auth Routes ================

    /// Login Routes
    $app->group('/login', function (RouteCollectorProxy $group){

        $group->get('', [LoginController::class, 'view'])
            ->setName('auth.login.view');
    });

    /// Register Routes
    $app->group('/register', function (RouteCollectorProxy $group){

        $group->get('', [RegisterController::class, 'view'])
            ->setName('auth.register.view');
    });
};