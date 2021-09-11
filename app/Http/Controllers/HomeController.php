<?php


namespace App\Http\Controllers;

use App\Models\User;
use Laminas\Config\Config;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController{

    private Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function index(Request $request, Response $response, array $args): Response{

        //$users = User::where("email", "avrpic8@gmail.com")->get();
        $users = User::all();
//        $sets = $this->config->toArray();
//        var_dump($sets['APP']);
//        exit();
        return view($response, 'home.index', compact('users'));
    }
}