<?php


namespace App\Http\Controllers;

use App\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController{

    public function index(Request $request, Response $response): Response{

        $users = User::find(1)->password;
        return view($response, 'home.index', compact('users'));
    }
}