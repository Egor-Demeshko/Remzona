<?php

declare(strict_types=1);

namespace Egor\Backend\Routes;

use Egor\Backend\Controller\Set\TopicAndQuestion;
use Egor\Backend\Controller\Statistics\SaveStatistics;
use Slim\App;

class Router
{
    public static function loadRoutes(App $app): void
    {
        $app->get('/api/all', [TopicAndQuestion::class, 'index']);
        $app->post('/api/save', [SaveStatistics::class, 'index']);
    }
}
