<?php

declare(strict_types=1);

namespace Egor\Backend\Kernel\Events;

use Egor\Backend\Kernel\Exceptions\EventsException;
use Generator;

class Events
{
    public const ON_REQUEST = 'on_request';
    public const ON_RESPONSE = 'on_response';

    private array $events = [
        self::ON_REQUEST => [],
        self::ON_RESPONSE => [],
    ];

    public function __construct()
    {
        $events = require_once __DIR__ . '/events.php';

        if (!isset($events)) {
            throw new EventsException();
        }

        foreach ($events as $id => $callback) {
            $this->events[$id][] = $callback;
        }
    }

    public function fireEvents(string $eventId): void
    {
        $events = $this->events[$eventId];

        foreach ($events as $event) {
            call_user_func($event);
        }
    }

    public function nextEvent(): Generator
    {
        foreach ($this->events as $key => $event) {
            yield $key;
        }
    }
}
