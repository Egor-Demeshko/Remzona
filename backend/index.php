<?php

declare(strict_types=1);

use Egor\Backend\Console\Utils\Registr;
use Egor\Backend\Kernel\Http\Response;

require_once __DIR__ . '/vendor/autoload.php';

try {
    echo (new Egor\Backend\Kernel\App())->run();
} catch (\Exception $e) {
    $response = Registr::get(Response::class);
    echo $response->json([
        'status' => false,
        'message' => $e->getMessage()
    ]);
    exit(1);
}
