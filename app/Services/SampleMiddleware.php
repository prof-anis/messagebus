<?php

namespace App\Services;

use App\Services\MessageBus\CommandBus\Interfaces\CommandInterface;
use App\Services\MessageBus\EventBus\Interfaces\EventInterface;

class SampleMiddleware
{
    public function handle(CommandInterface $event, callable $next): void
    {
        var_dump('Here i am in the sample middleware class.');
        $next($event);
    }
}
