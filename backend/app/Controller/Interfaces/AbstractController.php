<?php

declare(strict_types=1);

namespace Egor\Backend\Controller\Interfaces;

use Egor\Backend\Model\Abstract\BaseModel;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

abstract class AbstractController
{
    public function __construct(protected ?BaseModel $model = null) {}

    abstract public function index(Request $request, Response $response): Response;
}
