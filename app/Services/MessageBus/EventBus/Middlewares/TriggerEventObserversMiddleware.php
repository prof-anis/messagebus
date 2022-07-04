<?php

namespace App\Services\MessageBus\EventBus\Middlewares;

use App\Services\MessageBus\EventBus\Interfaces\EventInterface;
use App\Services\MessageBus\EventBus\StringEvent;
use Exception;

class TriggerEventObserversMiddleware
{
    public function handle(EventInterface $event, callable $next): void
    {
        foreach ($this->loadEventSubscribersRegister($event) as $listener) {
            call_user_func([new $listener, 'handle'], $event);
        }

        $next($event);
    }

    public function loadEventSubscribersRegister(EventInterface $event): array
    {
        $register = require __DIR__.'/../../register.php';

        $event = $this->resolveEventIdentifier($event);

        if (array_key_exists($event, $register['events'])) {
            return $register['events'][$event];
        }

        throw new Exception(sprintf('%s is not registered in the event bus.', $event));
    }

    public function resolveEventIdentifier(EventInterface $event): string
    {
        return $event instanceof StringEvent ? $event->event() : get_class($event);
    }
}
