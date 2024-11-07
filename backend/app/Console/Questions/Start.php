<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Questions;

use Egor\Backend\Console\Questions\Interfaces\Parser;
use Egor\Backend\Console\Utils\Registr;

class Start
{
    private Parser $parse;

    public function __construct()
    {
        $this->parse = Registr::get(ParseQuestions::class);
    }
    public function run(array $questions): void
    {
        $this->parse->parse($questions);
    }
}
