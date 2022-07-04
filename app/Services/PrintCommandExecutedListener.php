<?php

namespace App\Services;

use App\Services\MessageBus\EventBus\Interfaces\EventHandlerInterface;
use App\Services\MessageBus\EventBus\Interfaces\EventInterface;

class PrintCommandExecutedListener implements EventHandlerInterface
{

    public function handle(EventInterface $event): void
    {
        fwrite(STDOUT, "I printed Hello World.");
    }
}
