<?php

namespace App\Services\MessageBus\CommandBus\Interfaces;

interface CommandHandlerInterface
{
    public function handle(CommandInterface $event): void;
}
