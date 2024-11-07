<?php

declare(strict_types=1);

namespace Egor\Backend\Model;

use Egor\Backend\Model\Abstract\BaseModel;

class Topic extends BaseModel
{
    protected string $table = 'topics';

    protected string $heading;
    protected ?int $previousId;

    public function __construct(string $heading = null, int $previousId = null)
    {
        $this->heading = $heading;
        $this->previousId = $previousId;
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
        $data = ['heading' => $this->heading, 'previous_topic_id' => $this->previousId];
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
