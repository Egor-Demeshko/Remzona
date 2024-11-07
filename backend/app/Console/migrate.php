#!/usr/bin/env php
<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use Egor\Backend\Console\Migrations\Start;

try {
    (new Start())->run();
} catch (\Exception $e) {
    echo $e->getMessage();
    exit(1);
}
