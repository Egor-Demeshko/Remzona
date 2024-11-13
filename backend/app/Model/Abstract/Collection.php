<?php

declare(strict_types=1);

namespace Egor\Backend\Model\Abstract;

interface Collection extends \Iterator
{
    public function getArray(): array;
}
