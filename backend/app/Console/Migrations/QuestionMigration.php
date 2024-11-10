<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Migrations;

use Egor\Backend\Console\Migrations\Domains\MigrationUp;

class QuestionMigration extends MigrationUp
{
    public function up(): void
    {
        $connection = self::getConnection();
        $connection->exec('CREATE TABLE IF NOT EXISTS questions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            content text(255) NOT NULL,
            topic_id INT NOT NULL,
            next_topic_id INT,
            FOREIGN KEY (topic_id) REFERENCES topics(id),
            FOREIGN KEY (next_topic_id) REFERENCES topics(id)
        )');
    }
}
