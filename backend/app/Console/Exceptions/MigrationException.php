<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Exceptions;

class MigrationException extends \Exception
{
    public const DEFAULT_MESSAGE = 'Migration went wrong. Rollback was performed.' . PHP_EOL;

    public function __construct(string $message = self::DEFAULT_MESSAGE)
    {
        parent::__construct($message);
    }
}
