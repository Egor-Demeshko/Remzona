<?php

declare(strict_types=1);

namespace Egor\Backend\Console\Questions\Interfaces;

interface Parser
{
    public function parse(array $data): void;
}
