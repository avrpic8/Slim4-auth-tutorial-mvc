<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController extends MainController {

    public function index(Request $request, Response $response): Response{

        $name = "Saeed";
        return view($response, 'auth.home', compact('name'));
    }

    public function create(Request $request, Response $response): Response{
        return view($response, 'auth.create');
    }
}