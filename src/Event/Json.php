<?php

namespace MrMadClown\ServerSentEvents\Event;

use MrMadClown\ServerSentEvents\Event;

readonly class Json extends Event
{
    public function __construct(mixed $data, ?string $name = null, ?string $id = null)
    {
        parent::__construct(json_encode($data), $name, $id);
    }
}
