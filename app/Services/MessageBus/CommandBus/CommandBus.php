<?php

namespace App\Services\MessageBus\CommandBus;

use App\Services\MessageBus\CommandBus\Interfaces\CommandInterface;
use App\Services\MessageBus\CommandBus\Middlewares\TriggerCommandHandlerMiddleware;
use App\Services\MessageBus\MessageBus;

class CommandBus extends MessageBus
{
    protected const MIDDLEWARES = [
        TriggerCommandHandlerMiddleware::class,
    ];

    public function run(CommandInterface|string $command)
    {
        foreach (self::MIDDLEWARES as $middleware) {
            $this->addMiddleware(new $middleware);
        }

        $this->handle($this->prepareCommandForDispatch($command));
    }

    public function prepareCommandForDispatch(CommandInterface|string $command): CommandInterface
    {
        return is_string($command) ? new StringCommand($command) : $command;
    }
}
