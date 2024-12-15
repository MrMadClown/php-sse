<?php

namespace MrMadClown\ServerSentEvents;

final class EventStreamFormatter implements EventFormatter
{
    public function format(Event $event): string
    {
        $str = '';
        if ($event->name) {
            $str .= "event: {$event->name}\n";
        }
        if ($event->id) {
            $str .= "id: {$event->id}\n";
        }
        return $str . 'data: ' . $event->data . "\n\n";
    }
}
