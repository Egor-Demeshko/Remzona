<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

echo (new Egor\Backend\Kernel\App())->run();
