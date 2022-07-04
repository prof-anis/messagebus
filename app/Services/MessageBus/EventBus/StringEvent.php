<?php

namespace App\Services\MessageBus\EventBus;

use App\Services\MessageBus\EventBus\Interfaces\EventInterface;

class StringEvent implements EventInterface
{
    public function __construct(protected string $event)
    {
    }

    public function event(): string
    {
        return $this->event;
    }
}
