<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Migrations;

use Egor\Backend\Console\Migrations\Domains\MigrationUp;

class OptionMigration extends MigrationUp
{
    public function up(): void
    {
        $connection = self::getConnection();
        $connection->exec('CREATE TABLE IF NOT EXISTS options (
            id INT AUTO_INCREMENT PRIMARY KEY,
            option_content text(255) NOT NULL,
            question_id INT NOT NULL,
            FOREIGN KEY (question_id) REFERENCES questions(id)
        )');
    }
}
