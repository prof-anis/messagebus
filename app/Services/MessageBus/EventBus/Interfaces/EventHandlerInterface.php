<?php

namespace App\Services\MessageBus\EventBus\Interfaces;

interface EventHandlerInterface
{
    public function handle(EventInterface $event): void;
}
