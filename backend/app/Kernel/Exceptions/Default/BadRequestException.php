<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel\Exceptions;

use Exception;

class BadReqeustException extends Exception
{
    public const DEFAULT = 'Bad request.';
    public function __construct(string $message = self::DEFAULT)
    {
        parent::__construct($message);
    }
}
