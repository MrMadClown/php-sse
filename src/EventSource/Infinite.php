<?php

namespace MrMadClown\ServerSentEvents\EventSource;

use MrMadClown\ServerSentEvents\Event;
use MrMadClown\ServerSentEvents\EventSource;
use MrMadClown\ServerSentEvents\EventSource\Finite;

final readonly class Infinite implements Finite
{
    public function __construct(private EventSource $source)
    {
    }

    public function isDone(): bool
    {
        return false;
    }

    public function handle(): Event
    {
        return $this->source->handle();
    }

    public function timeout(): int
    {
        return $this->source->timeout();
    }
}
