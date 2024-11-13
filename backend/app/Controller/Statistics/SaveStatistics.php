<?php

declare(strict_types=1);

namespace Egor\Backend\Controller\Statistics;

use Egor\Backend\Controller\Interfaces\AbstractController;
use Egor\Backend\Model\Collections\AnswersCollection;
use Egor\Backend\Repository\AnswerRepository;

class SaveStatistics extends AbstractController
{


    public function index(): void
    {
        $data = $this->request->decodeBody();

        $collection = new AnswersCollection($data);
        $repository = new AnswerRepository($collection);

        $repository->save();

        $this->response->json([
            'status' => true,
            'message' => 'Answers were saved',
        ]);
    }
}
