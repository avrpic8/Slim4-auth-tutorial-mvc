<?php

namespace System\Application;

use DI\ContainerBuilder;
use Laminas\Config\Config;
use Slim\App;
use Illuminate\Database\Capsule\Manager;

class Application
{
    private static App $app;
    private static Config $config;

    private function loadProviders(){

        $appConfig = require dirname(__DIR__, 2) . '/config/settings.php';
        $providers = $appConfig['APP']['providers'];
        foreach ($providers as $provider) {
            $providerObject = new $provider();
            $providerObject->boot();
        }
    }

    private function initContainer(){

        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions(dirname(__DIR__, 2) . '/config/container.php');
        $container = $containerBuilder->build();

        self::$app = $container->get(App::class);
        self::$config = $container->get(Config::class);
    }

    private function initDatabase(){

        $dbSettings = self::$config->toArray()['db'];
        $capsule = new Manager();
        $capsule->addConnection($dbSettings);
        $capsule->bootEloquent();
        $capsule->setAsGlobal();
    }

    private function registersRoutes(){

        (require dirname(__DIR__, 2) . '/routes/web.php')(self::$app);
        (require dirname(__DIR__, 2) . '/config/middleware.php')(self::$app);
    }

    public static function getApp(): App{
        return self::$app;
    }

    public static function getConfig(): Config
    {
        return self::$config;
    }

    public function boot(): App{

        $this->loadProviders();
        $this->initContainer();
        $this->registersRoutes();
        $this->initDatabase();

        return self::$app;
    }
}