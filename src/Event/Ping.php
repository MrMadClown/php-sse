<?php

namespace MrMadClown\ServerSentEvents\Event;

final readonly class Ping extends Json
{
    public function __construct(string $time)
    {
        parent::__construct(compact('time'), 'ping');
    }
}

