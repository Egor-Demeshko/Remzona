<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Migrations\Domains;

use Egor\Backend\Database\DBConnection;

abstract class MigrationUp extends DBConnection
{
    abstract function up(): void;
}
