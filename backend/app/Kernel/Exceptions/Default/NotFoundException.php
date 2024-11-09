<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel\Exceptions\Default;

class NotFoundException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
