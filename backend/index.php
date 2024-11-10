<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

try {
    echo (new Egor\Backend\Kernel\App())->run();
} catch (\Exception $e) {
    echo $e->getMessage();
    exit(1);
}
