<?php

namespace MrMadClown\ServerSentEvents\EventSource;

use MrMadClown\ServerSentEvents\Event;
use MrMadClown\ServerSentEvents\EventSource;
use MrMadClown\ServerSentEvents\EventSource\Finite;

final class Multiple implements Finite
{
    public function __construct(private array $sources, private readonly float $timeout = 1.0)
    {
    }

    public function isDone(): bool
    {
        return count($this->sources) === 0;
    }

    public function handle(): Event
    {
        return $this->determineEventSource()->handle();
    }

    private function determineEventSource(): EventSource
    {
        do {
            $source = array_pop($this->sources);
            if ($source instanceof Finite && $source->isDone()) {
                $source = null;
            } else {
                array_unshift($this->sources, $source);
            }
        } while ($source === null);

        return $source;
    }

    public function timeout(): float
    {
        return $this->timeout;
    }
}
