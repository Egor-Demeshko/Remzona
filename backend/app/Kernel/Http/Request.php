<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel\Http;

class Request
{
    private array $params;
    private array $query;
    private string $body;
    private string $method;
    private string $route;

    public function __construct(array $params = null, array $query = null)
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->route = $_SERVER['REQUEST_URI'];
        $this->params = $params ?? $_GET;
        $this->query = $query ?? $_POST;
        $this->body = file_get_contents('php://input') ?? '';
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->route;
    }
}
