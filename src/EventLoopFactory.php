<?php

namespace MrMadClown\ServerSentEvents;

use MrMadClown\ServerSentEvents\EventSource\Finite;
use MrMadClown\ServerSentEvents\EventSource\Infinite;

final class EventLoopFactory
{
    public function make(EventSource $source): EventLoop
    {
        if (!$source instanceof Finite) {
            $source = new Infinite($source);
        }

        return new EventLoop(new EventStreamFormatter(), $source);
    }
}
