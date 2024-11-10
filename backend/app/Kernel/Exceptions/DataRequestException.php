<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel\Exceptions;

use Exception;

class DataRequestException extends Exception
{
    const DEFAULT_MESSAGE = 'Data request error. Is database available?';
    public function __construct(string $message = self::DEFAULT_MESSAGE)
    {
        parent::__construct($message);
    }
}
