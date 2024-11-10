<?php

declare(strict_types=1);

namespace Egor\Backend\Model\Abstract;

use Egor\Backend\Database\DBConnection;

abstract class BaseModel extends DBConnection
{
    protected ?int $id;
    protected string $table;

    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    abstract public function get(int $id): void;
    abstract public function all(): array;
    abstract public function insert(): bool;
    // abstract public function update(array $data): void;
    // abstract public function delete(int $id): void;
}
