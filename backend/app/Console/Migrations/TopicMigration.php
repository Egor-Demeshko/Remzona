<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Migrations;

use Egor\Backend\Console\Migrations\Domains\MigrationUp;

class TopicMigration extends MigrationUp
{
    public function up(): void
    {
        $connection = self::getConnection();
        $connection->exec('CREATE TABLE IF NOT EXISTS topics (
            id INT AUTO_INCREMENT PRIMARY KEY,
            heading text(255) NOT NULL,
            previous_topic_id INT NOT NULL,
            FOREIGN KEY (previous_topic_id) REFERENCES topics(id)
        )');
    }
}
