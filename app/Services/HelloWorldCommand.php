<?php

namespace App\Services;

use App\Services\MessageBus\CommandBus\Interfaces\CommandInterface;
use App\Services\MessageBus\EventBus\EventBus;

class HelloWorldCommand implements CommandInterface
{
    public function handle()
    {
        fwrite(STDOUT, "Hello World.");

        (new EventBus())->dispatch(new HelloWorldCommandExecutedEvent);
    }
}
