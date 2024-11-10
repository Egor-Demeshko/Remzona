<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Questions;

use Egor\Backend\Console\Exceptions\TransactionException;
use Egor\Backend\Console\Questions\Interfaces\Parser;
use Egor\Backend\Model\Option;
use Egor\Backend\Model\Question;
use Egor\Backend\Model\Topic;

class ParseQuestions implements Parser
{
    public function parse(array $data, int $topicId = null): mixed
    {
        $nextTopicId = null;

        foreach ($data as $key => $question) {
            if (is_int($key) && is_string($question)) {
                $question = new Question(content: $question, topicId: $topicId);
                $result = $question->insert();

                $result || throw new TransactionException('Couldnt create new question');
            } else if ($key === 'heading' && is_string($question)) {
                $topic = new Topic(heading: $question);
                if ($topic->insert()) {
                    $nextTopicId = $topicId = $topic->getId();
                } else {
                    throw new TransactionException();
                }
            } else if ($key === 'options' && is_array($question)) {
                $this->parse(data: $question, topicId: $topicId);
            } else if (is_string($key) && is_array($question)) {
                $nextTopicId = $this->parse(data: $question);
                $question = new Question(content: $key, topicId: $topicId, nextTopic: $nextTopicId);
                $result = $question->insert();

                $result || throw new TransactionException('Couldnt create new question');
            }
        }

        return $nextTopicId;
    }
}

        // foreach ($data as $key => $question) {
        //     // if $key === heading
        //     if ($key === 'heading') {
        //         $topic = new Topic(heading: $question, previousId: $previousTopicId);
        //         $result = $topic->insert();

        //         $result || throw new TransactionException("Couldnt create new topic");
        //         $previousTopicId = $topic->getId();
        //     } else if ($key === 'options' && is_array($question)) {
        //         $this->parse(data: $question, previousTopicId: $previousTopicId);
        //     } else if (is_string($key) && is_array($question)) {
                
        //         $questionObj = new Question(content: $key, topicId: $previousTopicId);
        //         $result = $questionObj->insert();

        //         $result || throw new TransactionException("Couldnt create new question");
        //         $this->parse(data: $question, previousTopicId: $previousTopicId);
        //     } else if (is_string($question)) {
        //         $question = new Question(content: $question, topicId: $previousTopicId);
        //         $result = $question->insert();

        //         $result || throw new TransactionException("Couldnt create new options");
        //     }
        // }