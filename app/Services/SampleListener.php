<?php

namespace App\Services;

use App\Services\MessageBus\CommandBus\Interfaces\CommandHandlerInterface;
use App\Services\MessageBus\CommandBus\Interfaces\CommandInterface;

class SampleListener implements CommandHandlerInterface
{
    public function handle(CommandInterface $event): void
    {
        echo 'Here i am in the listener class';
    }
}
