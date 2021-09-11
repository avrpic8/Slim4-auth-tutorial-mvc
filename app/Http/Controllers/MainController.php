<?php

namespace App\Http\Controllers;

use Laminas\Config\Config;

class MainController{

    protected Config $config;

    public function __construct(Config $config){
        $this->config = $config;
    }
}