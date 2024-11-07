<?php

declare(strict_types=1);

namespace Egor\Backend\Model;

use Egor\Backend\Model\Abstract\BaseModel;

class Topic extends BaseModel
{
    protected string $table = 'topics';

    protected string $heading;

    public function __construct(string $heading = null)
    {
        $this->heading = $heading;
    }

    public function get(int $id): void
    {
        $stmt = $this->getBaseDelete($this->table);
        $result = $stmt->execute(['id' => $id]);
        // TODO
        // result handling 
    }

    public function all(): void
    {
        $stmt = $this->getBaseAll($this->table);
        $result = $stmt->execute();
        // TODO
    }

    public function insert(): bool
    {
        $data = ['heading' => $this->heading];
        $stmt = $this->getBaseInsert($this->table, $data);
        return $stmt->execute($data);
    }
}
