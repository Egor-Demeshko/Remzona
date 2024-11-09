<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel\Exceptions;

class EventsException extends \Exception
{
    public const LOAD = 'Couldn\'t load events';

    public function __construct(string $message = self::LOAD)
    {
        parent::__construct($message);
    }
}
