<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Exceptions;

use Exception;

class TransactionException extends Exception
{
    public const DEFAULT_MESSAGE = 'Database transaction faild!';

    public function __construct(string $message = self::DEFAULT_MESSAGE)
    {
        $message = '[Error]: ' . $message . PHP_EOL;
        parent::__construct($message);
    }
}
