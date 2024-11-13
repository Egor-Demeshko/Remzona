<?php

declare(strict_types=1);

namespace Egor\Backend\Model;

use Egor\Backend\Model\Abstract\BaseModel;

class Answer extends BaseModel
{
    public function __construct(
        protected int $question_id,
        protected string $content,
        protected int $topic_id
    ) {
        $this->setTable('answers');
    }

    public function get(int $id): void {}

    public function all(): array
    {
        return [];
    }

    public function insert(): bool
    {
        $data = $this->toArray();
        $stmt = $this->getBaseInsert($this->table, $data);

        return $stmt->execute($data);;
    }

    public function toArray(): array
    {
        return [
            'question_id' => $this->question_id,
            'content' => $this->content,
            'topic_id' => $this->topic_id
        ];
    }
}
