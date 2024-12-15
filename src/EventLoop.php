<?php

namespace MrMadClown\ServerSentEvents;

use MrMadClown\ServerSentEvents\EventSource\Finite;

final readonly class EventLoop
{
    public function __construct(private EventFormatter $formatter, private Finite $source)
    {
    }

    public function run(): void
    {
        header("X-Accel-Buffering: no");
        header("Content-Type: text/event-stream");
        header("Cache-Control: no-cache");

        while ($this->source->isDone() === false) {
            echo $this->formatter->format($this->source->handle());

            while (ob_get_level() > 0) {
                ob_end_flush();
            }
            flush();

            if (connection_aborted()) break;

            usleep($this->source->timeout() * 1000000);
        }
    }
}

