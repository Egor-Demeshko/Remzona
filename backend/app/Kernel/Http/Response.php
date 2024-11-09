<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel\Http;

class Response
{
    public function __construct(
        public string $content = '',
        public int $statusCode = 200,
    ) {}
}
