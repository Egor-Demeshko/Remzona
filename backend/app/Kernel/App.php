<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel;

use Dotenv\Dotenv;
use Egor\Backend\Kernel\Events\Events;
use Egor\Backend\Kernel\Http\Response;
use Egor\Backend\Kernel\Registr;
use Egor\Backend\Routes\Router;

class App
{
    public function init(): void
    {
        $this->setEnv();
        Registr::init();
        Router::init();
    }

    public function run(): Response
    {
        $this->init();

        $events = Registr::get(Events::class);

        foreach ($events->nextEvent() as $eventId) {
            $events->fireEvents($eventId);
        }

        return Registr::get(Response::class);
    }

    private function setEnv(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $result = $dotenv->load();

        foreach ($result as $key => $value) {
            putenv("$key=$value");
        }
    }
}
