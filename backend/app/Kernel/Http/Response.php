<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel\Http;

class Response
{
    public const HTTP_OK = 200;
    public function __construct(
        public string $content = '',
        public int $statusCode = self::HTTP_OK,
    ) {}

    public function json(array $data): void
    {
        header('Content-Type: application/json');
        $this->content = json_encode($data);
    }

    public function __toString()
    {
        return $this->content;
    }
}
