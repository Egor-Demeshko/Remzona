<?php

declare(strict_types=1);

namespace Egor\Backend\Model;

use Egor\Backend\Model\Abstract\BaseModel;

class Topic extends BaseModel
{
    protected ?string $heading;

    public function __construct(string $heading = null)
    {
        $this->heading = $heading;
        $this->setTable('topics');
    }

    public function get(int $id): void
    {
        $stmt = $this->getBaseDelete($this->table);
        $result = $stmt->execute(['id' => $id]);
        // TODO
        // result handling 
    }

    public function all(): array
    {
        $stmt = $this->getBaseAll($this->table);
        $result = $stmt->execute();

        if ($result) {
            return $stmt->fetchAll();
        }

        return [];
    }

    public function insert(): bool
    {
        $data = ['heading' => $this->heading];
        $stmt = $this->getBaseInsert($this->table, $data);
        $result = $stmt->execute($data);

        if ($result) {
            $connection = $this->getConnection();
            $id = $connection->lastInsertId();

            if ($id) {
                $this->setId((int) $id);
            }
        }

        return $result;
    }
}
