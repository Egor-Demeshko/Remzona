<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel;

use Egor\Backend\Kernel\Events\Events;
use Egor\Backend\Kernel\Http\Request;
use Egor\Backend\Kernel\Http\Response;
use Egor\Backend\Repository\AnswerRepository;
use Egor\Backend\Routes\Router;

class Registr
{
    private static array $services = [];

    private function __construct() {}

    public static function init(): void
    {
        self::$services[Request::class] = new Request();
        self::$services[Response::class] = new Response();
        self::$services[Events::class] = new Events();

        Router::setRequest(self::$services[Request::class]);
    }

    public static function get(string $service): ?object
    {
        return self::$services[$service] ?? null;
    }
}
