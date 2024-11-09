<?php

declare(strict_types=1);

namespace Egor\Backend\Controller\Topics;

use Egor\Backend\Controller\Interfaces\AbstractController;
use Egor\Backend\Model\Topic;

abstract class TopicAbstract extends AbstractController
{
    public function __construct()
    {
        parent::__construct(new Topic());
    }
}
