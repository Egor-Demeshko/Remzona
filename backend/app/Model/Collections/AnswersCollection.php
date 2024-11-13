<?php

declare(strict_types=1);

namespace Egor\Backend\Model\Collections;

use Egor\Backend\Model\Abstract\Collection;
use Egor\Backend\Model\Answer;

class AnswersCollection implements Collection
{
    protected string $className = Answer::class;
    private array $collection = [];
    private int $position = 0;

    public function __construct(array $data)
    {
        foreach ($data as $answer) {
            unset($answer['next_topic_id']);
            $this->collection[] = new $this->className(...$answer);
        }
    }

    public function current(): mixed
    {
        return $this->collection[$this->position];
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->collection[$this->position]);
    }

    public function getArray(): array
    {
        return $this->collection;
    }
}
