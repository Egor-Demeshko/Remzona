<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Utils;

use Egor\Backend\Console\Questions\ParseQuestions;
use Egor\Backend\Kernel\Http\Request;

class Registr
{
    private static array $services = [];
    public static function init()
    {
        self::$services[ParseQuestions::class] = new ParseQuestions();
    }

    public static function get(string $service): ?object
    {
        return self::$services[$service] ?? null;
    }
}
