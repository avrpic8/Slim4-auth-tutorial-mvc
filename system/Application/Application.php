<?php

namespace System\Application;

use DI\ContainerBuilder;
use Laminas\Config\Config;
use Slim\App;
use Illuminate\Database\Capsule\Manager;

class Application
{
    private App $app;
    private Config $config;

    public function __construct()
    {
        $this->initContainer();
        $this->registersRoutes();
        $this->initDatabase();
    }

    private function initContainer(){

        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions(__DIR__ . '/../../config/container.php');
        $container = $containerBuilder->build();

        $this->app = $container->get(App::class);
        $this->config = $container->get(Config::class);
    }

    private function initDatabase(){

        $dbSettings = $this->config->toArray()['db'];
        $capsule = new Manager();
        $capsule->addConnection($dbSettings);
        $capsule->bootEloquent();
        $capsule->setAsGlobal();
    }

    private function registersRoutes(){

        (require __DIR__ . '/../../routes/web.php')($this->app);
        (require __DIR__ . '/../../config/middleware.php')($this->app);
    }

    public function getApp(){
        return $this->app;
    }
}