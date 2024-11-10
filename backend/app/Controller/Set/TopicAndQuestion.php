<?php

declare(strict_types=1);

namespace Egor\Backend\Controller\Set;

use Egor\Backend\Controller\Interfaces\AbstractController;
use Egor\Backend\Kernel\Exceptions\BadReqeustException;
use Egor\Backend\Model\Question;
use Egor\Backend\Model\Topic;
use Egor\Backend\Repository\WholeSetRepository;

class TopicAndQuestion extends AbstractController
{
    private Topic $topic;
    private Question $question;
    private WholeSetRepository $setRepository;

    public function __construct()
    {
        parent::__construct();
        $this->topic = new Topic();
        $this->question = new Question();
        $this->setRepository = new WholeSetRepository(
            $this->topic->getTable(),
            $this->question->getTable()
        );
    }

    public function index(): void
    {
        $set = $this->setRepository->getSet();

        if (!is_array($set)) {
            throw new BadReqeustException();
        }

        $this->response->json($set);
    }
}
