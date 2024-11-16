<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel;

use Dotenv\Dotenv;

class Env
{
    public static function load(): void
    {
        $env = Dotenv::createImmutable(__DIR__ . '/../../')->load();

        array_walk($env, function ($value, $key) {
            putenv("$key=$value");
        });
    }
}
