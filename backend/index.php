<?php

declare(strict_types=1);

use Egor\Backend\Kernel\Env;
use Egor\Backend\Routes\Router;
use Slim\Factory\AppFactory;
use Monolog\Logger;
use Monolog\Level;
use Monolog\Handler\StreamHandler;

require_once __DIR__ . '/vendor/autoload.php';

try {
    $app = AppFactory::create();
    Env::load();
    Router::loadRoutes($app);

    $app->run();
} catch (Exception | Error $e) {
    $logger = new Logger('uncaught');
    $logger->pushHandler(new StreamHandler(__DIR__ . '/logs/uncaught.log', Level::Error));
}
