<?php

declare(strict_types=1);

namespace Egor\Backend\Model;

use Egor\Backend\Model\Abstract\BaseModel;

class Question extends BaseModel
{
    protected string $table = 'questions';

    protected ?string $content;
    protected ?int $topicId;
    protected ?int $previousId;
    protected ?int $nextTopic;

    public function __construct(string $content = null, int $topicId = null, int $nextTopic = null)
    {
        $this->content = $content;
        $this->topicId = $topicId;
        $this->nextTopic = $nextTopic;
        $this->setTable('questions');
    }

    public function get(int $id): void
    {
        $stmt = $this->getBaseGet($this->table);
        $result = $stmt->execute(['id' => $id]);
        // TODO
        // result handling 
    }

    public function all(): array
    {
        $stmt = $this->getBaseAll($this->table);
        $result = $stmt->execute();
        // TODO
        // result handling 
        return [];
    }

    public function insert(): bool
    {
        $data = [
            'content' => $this->content,
            'topic_id' => $this->topicId,
            'next_topic_id' => $this->nextTopic
        ];

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

    public function update(array $data): void
    {
        $stmt = $this->getBaseUpdate($this->table, $data);
        $result = $stmt->execute(['content' => $this->content, 'topicId' => $this->topicId, 'previousId' => $this->previousId, 'id' => $this->id]);
        // TODO
        // result handling 
    }

    public function delete(int $id): void
    {
        $stmt = $this->getBaseDelete($this->table);
        $result = $stmt->execute(['id' => $this->id]);
        // TODO
        // result handling 
    }
}
