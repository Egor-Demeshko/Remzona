<?php

declare(strict_types=1);

namespace Egor\Backend\Repository;

use Egor\Backend\Database\DBConnection;
use Egor\Backend\Kernel\Exceptions\DataRequestException;
use Egor\Backend\Model\Question;
use Egor\Backend\Model\Topic;

class WholeSetRepository extends DBConnection
{
    public function __construct(private string $topicTable, private string $questionTable) {}

    public function getSet(): array
    {
        $sql = 'SELECT heading, q.id as id, content, topic_id, next_topic_id
                FROM ' . $this->topicTable . ' t
                LEFT JOIN ' . $this->questionTable . ' q ' .
            'ON t.id = q.topic_id ';

        $data = $this->request($sql);

        return $this->createAllSet($data);
    }

    private function request(string $sql): array
    {
        $connection = self::getConnection();
        $statement = $connection->prepare($sql);
        $result = $statement->execute();

        if (!$result) {
            throw new DataRequestException();
        }

        return $statement->fetchAll();
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
    private function createAllSet(array $data): array
    {
        $set = [];

        foreach ($data as $topic) {
            $topicId = $topic['topic_id'];

            if (isset($set[$topicId])) {
                $set[$topicId]['questions'][] = Question::createFromDB($topic)->toArray();
            } else {
                $set[$topicId] = [
                    'topic_id' => $topicId,
                    'heading' => $topic['heading'],
                    'questions' => [Question::createFromDB($topic)->toArray()]
                ];
            }
        }

        return $set;
    }
}
