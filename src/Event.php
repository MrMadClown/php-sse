<?php

namespace MrMadClown\ServerSentEvents;

readonly class Event
{
    public function __construct(public string $data, public ?string $name = null, public ?string $id = null)
    {
    }
}
