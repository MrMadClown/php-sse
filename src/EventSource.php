<?php

namespace MrMadClown\ServerSentEvents;

interface EventSource
{
    public function handle(): Event;

    public function timeout(): float;
}
