<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel\Exceptions;

class RouteBadConfigException extends RouteBadConfigException
{
    public const DEFAULT_MESSAGE = 'Bad route config. Couldn\'t proceed.';
    public const BAD_CONTROLLER = 'Controller must be a subclass of AbstractController';

    public function __construct(string $message = self::DEFAULT_MESSAGE)
    {
        parent::__construct($message);
    }
}
