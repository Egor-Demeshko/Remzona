<?php

declare(strict_types=1);

namespace Egor\Backend\Controller\Set;

use Egor\Backend\Controller\Interfaces\AbstractController;
use Egor\Backend\Kernel\Exceptions\BadReqeustException;
use Egor\Backend\Model\Question;
use Egor\Backend\Model\Topic;
use Egor\Backend\Repository\WholeSetRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

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

    public function index(Request $request, Response $response): Response
    {
        $set = $this->setRepository->getSet();

        if (!is_array($set)) {
            throw new BadReqeustException();
        }

        $response->withStatus(200);
        $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($set));
        return $response;
    }
}
