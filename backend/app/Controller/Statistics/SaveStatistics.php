<?php

declare(strict_types=1);

namespace Egor\Backend\Controller\Statistics;

use Egor\Backend\Controller\Interfaces\AbstractController;
use Egor\Backend\Model\Collections\AnswersCollection;
use Egor\Backend\Repository\AnswerRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class SaveStatistics extends AbstractController
{
    public function index(Request $request, Response $response): Response
    {
        $data = (string) $request->getBody();
        $data = stripslashes(trim($data, '"'));
        $data = json_decode($data, true);

        $collection = new AnswersCollection($data);
        $repository = new AnswerRepository($collection);

        $repository->save();

        $response
            ->getBody()
            ->write(json_encode([
                'status' => true,
                'message' => 'Answers were saved',
            ]));

        $response->withStatus(200);
        $response->withHeader('Content-Type', 'application/json');

        return $response;
    }
}
