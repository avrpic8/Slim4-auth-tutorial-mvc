<?php


namespace App\Providers;

use DI\Container;
use Illuminate\Database\Capsule\Manager;

class DatabaseProvider extends Provider
{
    private $capsule;
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function boot()
    {
        $dbSettings = getConfig()->get('db');
        $this->capsule = new Manager();
        $this->capsule->addConnection($dbSettings);
        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();

        $this->container->set('db', $this->capsule);
    }

    public function getCapsule(){
        return $this->capsule;
    }
}