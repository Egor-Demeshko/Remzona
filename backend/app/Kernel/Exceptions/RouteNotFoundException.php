<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel\Exceptions;

use Egor\Backend\Kernel\Exceptions\Default\NotFoundException;

class RouteNotFoundException extends NotFoundException
{
    public const DEFAULT_MESSAGE = 'Route was not found!';

    public function __construct(string $message = self::DEFAULT_MESSAGE)
    {
        parent::__construct($message);
    }
}
