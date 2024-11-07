<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Migrations;

use Egor\Backend\Console\Migrations\Domains\MigrationUp;

class AnswerMigration extends MigrationUp
{
    public function up(): void
    {
        $connection = self::getConnection();
        $connection->exec('CREATE TABLE IF NOT EXISTS answers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            answer_content text(255),
            question_id INT NOT NULL,
            FOREIGN KEY (question_id) REFERENCES questions(id)
        )');
    }
}
