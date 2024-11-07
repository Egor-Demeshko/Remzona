<?php

declare(strict_types=1);

namespace Egor\Backend\Model\Abstract;

use Egor\Backend\Database\DBConnection;

abstract class BaseModel extends DBConnection
{
    protected ?int $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    abstract public function get(int $id): void;
    abstract public function all(): void;
    abstract public function insert(): bool;
    // abstract public function update(array $data): void;
    // abstract public function delete(int $id): void;
}
