<?php

declare(strict_types=1);

namespace Egor\Backend\Routes;

use Egor\Backend\Controller\Interfaces\AbstractController;
use Egor\Backend\Kernel\Exceptions\RouteBadConfigException;
use Egor\Backend\Kernel\Exceptions\RouteNotFoundException;
use Egor\Backend\Kernel\Http\Request;

class Router
{
    private static $routes = [];
    private static ?Request $request = null;

    public const GET = 'GET';
    public const POST = 'POST';

    public static function init(): void
    {
        self::$routes = [
            self::GET => [],
            self::POST => [],
        ];

        self::loadRoutes();
    }

    private static function loadRoutes(): void
    {
        $routes = require_once __DIR__ . '/routes.php';

        foreach ($routes as $method => $controller) {
            [$method, $route] = explode(':', $method);

            $reflection = new \ReflectionClass($controller);

            if (!$reflection->isSubclassOf(AbstractController::class)) {
                throw new RouteBadConfigException(RouteBadConfigException::BAD_CONTROLLER);
            }

            if (isset(self::$routes[$method])) {
                self::$routes[$method][$route] = $controller;
            }
        }
    }

    public static function setRequest(Request $request): void
    {
        self::$request = $request;
    }

    public static function navigate(): void
    {
        $method = self::$request->getMethod();
        $route = self::$request->getUri();

        if (isset(self::$routes[$method][$route])) {
            $class = self::$routes[$method][$route];

            $controller = new $class();
            $controller->index();
        } else {
            throw new RouteNotFoundException();
        }
    }
}
