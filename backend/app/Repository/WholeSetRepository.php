<?php

declare(strict_types=1);

namespace Egor\Backend\Repository;

use Egor\Backend\Model\Topic;

class WholeSetRepository
{
    public function __construct(private string $topicTable, private string $questionTable) {}

    public function getSet(): array
    {
        $sql = 'SELECT t.id, t.heading, t.previous_topic_id';
    }
}


/* [
    topic_id = [
        topic_id,
        heading,
        questions = [
            [
                question_id,
                question,
                next_topic_id
            ],
            [
                question_id,
                question
            ]
        ]
    ]
]*/