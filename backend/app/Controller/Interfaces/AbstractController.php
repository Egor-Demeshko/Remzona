<?php

declare(strict_types=1);

namespace Egor\Backend\Controller\Interfaces;

use Egor\Backend\Kernel\Http\Request;
use Egor\Backend\Kernel\Registr;
use Egor\Backend\Kernel\Http\Response;
use Egor\Backend\Model\Abstract\BaseModel;

abstract class AbstractController
{
    protected Request $request;
    protected Response $response;

    public function __construct(protected BaseModel $model)
    {
        $this->request = Registr::get(Request::class);
        $this->response = Registr::get(Response::class);
    }

    abstract public function index(): void;
}
