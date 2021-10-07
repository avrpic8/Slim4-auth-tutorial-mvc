<?php


namespace App\Http\Controllers\Auth;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RegisterController
{
    public function view(Request $request, Response $response, array $args):Response
    {
        return view($response, 'auth.register');
    }
}