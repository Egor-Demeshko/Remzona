<?php

declare(strict_types=1);

namespace Egor\Backend\Database;

use PDO;

class DBConnection
{
    private static ?PDO $connection = null;

    public static function connect(): PDO
    {
        if (!isset(self::$connection)) {
            $host = getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost';
            $port = getenv('DB_PORT') ? getenv('DB_PORT') : '3306';
            $dbName = getenv('DB_NAME') ? getenv('DB_NAME') : '';
            $user = getenv('DB_USER') ? getenv('DB_USER') : 'root';
            $pass = getenv('DB_PASS') ? getenv('DB_PASS') : null;
            self::$connection = new PDO(
                "mysql:host=$host;port=$port;dbname=$dbName;auth_plugin=caching_sha2_password",
                $user,
                $pass
            );
        }

        return self::$connection;
    }

    public static function getConnection(): PDO
    {
        return self::connect();
    }

    protected function getBaseDelete(string $table): \PDOStatement
    {
        $connection = self::getConnection();
        return $connection->prepare("SELECT * FROM $table WHERE id = :id");
    }

    protected function getBaseUpdate(string $table, array $data): \PDOStatement
    {
        $connection = self::getConnection();
        $fields = $this->makeFields($data);

        return $connection->prepare("UPDATE $table SET $fields WHERE id = :id");
    }

    protected function getBaseInsert(string $table, array $data): \PDOStatement
    {
        $connection = self::getConnection();
        $fields = $this->makeKeys($data);
        $values = $this->makeValues($data);

        return $connection->prepare("INSERT INTO $table ($fields) VALUES ($values)");
    }

    protected function getBaseAll(string $table): \PDOStatement
    {
        $connection = self::getConnection();

        return $connection->prepare("SELECT * FROM $table");
    }

    protected function getBaseGet(string $table): \PDOStatement
    {
        $connection = self::getConnection();

        return $connection->prepare("SELECT * FROM $table WHERE id = :id");
    }

    private function makeKeys(array $fillable): string
    {
        $fields = '';

        foreach ($fillable as $key => $value) {
            $fields .= "$key, ";
        }

        return substr($fields, 0, -2);
    }

    private function makeValues(array $data): string
    {
        $values = '';

        foreach ($data as $key => $value) {
            $values .= ":$key, ";
        }

        return substr($values, 0, -2);
    }

    private function makeFields(array $data): string
    {
        $fields = '';

        foreach ($data as $key => $value) {
            $fields .= "$key = :$key, ";
        }

        return substr($fields, 0, -2);
    }
}
