<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Questions;

use Dotenv\Dotenv;
use Egor\Backend\Console\Exceptions\TransactionException;
use Egor\Backend\Console\Questions\Interfaces\Parser;
use Egor\Backend\Console\Utils\Registr;
use Egor\Backend\Database\DBConnection;
use PDO;

class Start
{
    private Parser $parse;
    private PDO $connection;

    public function __construct()
    {
        $this->parse = Registr::get(ParseQuestions::class);
        $this->setEnv();
        $this->connection = DBConnection::getConnection();
    }

    public function run(array $questions): void
    {
        try {
            $this->connection->beginTransaction();
            $this->parse->parse($questions);
            $this->connection->commit();
        } catch (\Exception | \Error $e) {
            $this->connection->rollBack();
            echo $e->getMessage() . PHP_EOL;
            throw new TransactionException();
        }
    }

    private function setEnv(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
        $entries = $dotenv->load();

        foreach ($entries as $key => $value) {
            putenv("$key=$value");
        }
    }
}
