<?php

namespace MrMadClown\ServerSentEvents\EventSource;

use MrMadClown\ServerSentEvents\EventSource;

interface Finite extends EventSource
{
    public function isDone(): bool;
}

