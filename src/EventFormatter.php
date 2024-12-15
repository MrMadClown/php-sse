<?php

namespace MrMadClown\ServerSentEvents;

interface EventFormatter
{
    public function format(Event $event): string;
}
