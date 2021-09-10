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

    public function index(Request $request, Response $response): Response{

        $users = User::find(1)->password;
//        $sets = $this->config->toArray();
//        var_dump($sets['root']);
//        exit();
        return view($response, 'home.index', compact('users'));
    }
}