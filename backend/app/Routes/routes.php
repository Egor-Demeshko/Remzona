<?php

declare(strict_types=1);

use Egor\Backend\Controller\Questions\GetQuestion;
use Egor\Backend\Controller\Set\TopicAndQuestion;
use Egor\Backend\Controller\Topics\GetAllTopics;
use Egor\Backend\Routes\Router;

return [
    Router::GET . ":/api/questions/{id}" => GetQuestion::class,
    Router::GET . ":/api/all" => TopicAndQuestion::class
];
