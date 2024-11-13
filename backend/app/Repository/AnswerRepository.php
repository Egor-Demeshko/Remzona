<?php

declare(strict_types=1);

namespace Egor\Backend\Repository;

use Egor\Backend\Database\DBConnection;
use Egor\Backend\Kernel\Exceptions\DataInsertException;
use Egor\Backend\Model\Abstract\Collection;

class AnswerRepository extends DBConnection
{
    private \PDO $connection;

    public function __construct(private Collection $collection) {}

    public function save(): void
    {
        try {
            $this->connection = $this::getConnection();
            $this->connection->beginTransaction();

            foreach ($this->collection as $answer) {
                $result = $answer->insert();
                if (!$result) {
                    throw new DataInsertException();
                }
            }

            $this->connection->commit();
        } catch (\Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }
    }
}
