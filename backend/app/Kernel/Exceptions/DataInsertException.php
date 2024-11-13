<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel\Exceptions;

class DataInsertException extends \Exception
{
    public const DEFAULT_MESSAGE = 'Data insert error';

    public function __construct(string $message = self::DEFAULT_MESSAGE)
    {
        parent::__construct($message);
    }
}
