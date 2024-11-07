<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Questions;

use Egor\Backend\Console\Questions\Interfaces\Parser;
use Egor\Backend\Model\Question;
use Egor\Backend\Model\Topic;

class ParseQuestions implements Parser
{
    public function parse(array $data, $previousTopicId = null): void
    {
        foreach ($data as $key => $question) {
            // if $key === heading
            if ($key === 'heading') {
                $topic = new Topic(...$data, previousId: $previousTopicId);
                $topic->insert();
            } else if ($key === 'options' && is_array($question)) {
                $this->parse($question);
            } else if (is_string($question)) {
                $question = new Question(...$data, topicId: $previousTopicId);
                $question->insert();
            }
        }
    }
}
