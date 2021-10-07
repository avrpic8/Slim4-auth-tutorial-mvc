<?php

namespace System\Application;

use App\Providers\DatabaseProvider;
use App\Providers\SessionProvider;
use App\Providers\TranslationProvider;
use DI\Container;
use DI\ContainerBuilder;
use PHLAK\Config\Config;
use Slim\App;

class Application
{
    private static App $app;
    private Container $container;
    private static Config $config;

    private function initContainer(){

        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions(dirname(__DIR__, 2) . '/config/container.php');
        $this->container = $containerBuilder->build();

        self::$app = $this->container->get(App::class);
        self::$config = $this->container->get(Config::class);
    }

    private function loadHelpers(){

        require dirname(__DIR__) . '/Helpers/helpers.php';
        if(file_exists(dirname(__DIR__, 2) . '/app/Http/helpers.php')){
            require_once (dirname(__DIR__, 2) . '/app/Http/helpers.php');
        }
    }

    private function loadProviders(){

        $databaseProvider = new DatabaseProvider($this->container);
        $databaseProvider->boot();

        $translatorProvider = new TranslationProvider($this->container);
        $translatorProvider->boot();

        $session = new SessionProvider();
        $session->boot();
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

        $this->initContainer();
        $this->loadHelpers();
        $this->loadProviders();
        $this->registersRoutes();

        return self::$app;
    }
}