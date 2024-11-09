<?php

declare(strict_types=1);

use Egor\Backend\Kernel\Events\Events;
use Egor\Backend\Routes\Router;

return [
    Events::ON_REQUEST => [Router::class, 'navigate'],
];
