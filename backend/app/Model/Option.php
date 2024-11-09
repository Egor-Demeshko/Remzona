<?php

declare(strict_types=1);

namespace Egor\Backend\Model;

use Egor\Backend\Model\Abstract\BaseModel;

class Option extends BaseModel
{
    private string $optionContent;
    private int $questionId;

    public function __construct(string $optionContent, int $questionId)
    {
        parent::__construct();
        $this->optionContent = $optionContent;
        $this->questionId = $questionId;
        $this->setTable('options');
    }

    public function get(int $id): void
    {
        $stmt = $this->getBaseGet($this->table);
        $result = $stmt->execute(['id' => $id]);
        // TODO
        // result handling 
    }

    public function all(): void
    {
        $stmt = $this->getBaseAll($this->table);
        $result = $stmt->execute();
        // TODO
        // result handling 
    }

    public function insert(): bool
    {
        $data = [
            'option_content' => $this->optionContent,
            'question_id' => $this->questionId
        ];

        $stmt = $this->getBaseInsert($this->table, $data);
        return $stmt->execute($data);
    }
}
