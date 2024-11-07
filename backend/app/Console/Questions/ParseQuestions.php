<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Questions;

use Egor\Backend\Console\Exceptions\TransactionException;
use Egor\Backend\Console\Questions\Interfaces\Parser;
use Egor\Backend\Model\Question;
use Egor\Backend\Model\Topic;

class ParseQuestions implements Parser
{
    public function parse(array $data, $previousTopicId = null): void
    {
        // TODO: refator for <free>
        foreach ($data as $key => $question) {
            // if $key === heading
            if ($key === 'heading') {
                $topic = new Topic(heading: $question, previousId: $previousTopicId);
                $result = $topic->insert();

                $result || throw new TransactionException("Couldnt create new topic");
                $previousTopicId = $topic->getId();
            } else if ($key === 'options' && is_array($question)) {
                $this->parse($question, $previousTopicId);
            } else if (is_string($key) && is_array($question)) {
                $questionObj = new Question(content: $key, topicId: $previousTopicId);
                $result = $questionObj->insert();

                $result || throw new TransactionException("Couldnt create new question");
                $this->parse($question, $previousTopicId);
            } else if (is_string($question)) {
                $question = new Question(content: $question, topicId: $previousTopicId);
                $question->insert();
            }
        }
    }
}
