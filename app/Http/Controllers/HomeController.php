<?php


namespace App\Http\Controllers;

use App\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends MainController {

    public function index(Request $request, Response $response, array $args): Response{

        //$users = User::where("email", "avrpic8@gmail.com")->get();
        $users = User::all();
        return view($response, 'index', compact('users'));
    }
}