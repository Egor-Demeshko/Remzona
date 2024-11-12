<?php

declare(strict_types=1);

use Egor\Backend\Controller\Questions\GetQuestion;
use Egor\Backend\Controller\Statistics\SaveStatistics;
use Egor\Backend\Controller\Set\TopicAndQuestion;
use Egor\Backend\Routes\Router;

return [
    Router::GET . ":/api/questions/{id}" => GetQuestion::class,
    Router::GET . ":/api/all" => TopicAndQuestion::class,
    Router::POST . ":/api/save" => SaveStatistics::class,
];
