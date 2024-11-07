<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Migrations;

use Egor\Backend\Console\Exceptions\MigrationException;
use Egor\Backend\Console\Migrations\Domains\MigrationUp;
use Dotenv\Dotenv;

class Start
{
    private array $migrations = [];

    /** Add classes that should be run for migrations */
    private array $migrationsNames = [
        TopicMigration::class,
        QuestionMigration::class,
        AnswerMigration::class
    ];

    public function run(): void
    {
        $this->setEnv();
        $this->setMigrations();
        $this->runMigrations();
    }

    private function setEnv(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
        $entries = $dotenv->load();

        foreach ($entries as $key => $value) {
            putenv("$key=$value");
        }
    }

    public function setMigrations(): void
    {
        foreach ($this->migrationsNames as $className) {
            if ($this->migrationPossible($className)) {
                $this->migrations[] = new $className();
            }
        }
    }

    public function runMigrations(): void
    {
        $connection = MigrationUp::getConnection();
        $connection->exec('START TRANSACTION');
        try {
            foreach ($this->migrations as $migration) {
                $migration->up();
            }
        } catch (\Exception $e) {
            $connection->exec('ROLLBACK');
            echo PHP_EOL . $e->getMessage() . PHP_EOL;
            throw new MigrationException();
        }

        $connection->exec('COMMIT');

        echo PHP_EOL . "[Success]: Migration was successful!" . PHP_EOL;
    }

    private function migrationPossible(string $className): bool
    {
        $reflection = new \ReflectionClass($className);

        if ($reflection->isSubclassOf(MigrationUp::class)) {
            return true;
        }

        echo "[WARNING]: Migration is not possible for " . $className . PHP_EOL;
        echo "[WARNING]: Should extend " . MigrationUp::class . PHP_EOL;

        return false;
    }
}
