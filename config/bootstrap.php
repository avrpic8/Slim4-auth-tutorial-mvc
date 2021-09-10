<?php

use DI\ContainerBuilder;
use Laminas\Config\Config;
use Slim\App;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

// Set up settings
$containerBuilder->addDefinitions(__DIR__ . '/container.php');

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Get all settings parameters
$config = $container->get(Config::class);

// Database init
$dbSettings = $config->toArray()['db'];
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($dbSettings);
$capsule->bootEloquent();
$capsule->setAsGlobal();

// Create App instance
$app = $container->get(App::class);

// Register routes
(require __DIR__ . '/../routes/web.php')($app);

// Register middleware
(require __DIR__ . '/middleware.php')($app);

return $app;