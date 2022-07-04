<?php

namespace App\Services;

class Console
{
    const DEFAULT_COMMAND = "hello";

    private MessageBus\CommandBus\CommandBus $commandBus;

    private mixed $command = '';

    public function __construct()
    {
        $this->commandBus = new MessageBus\CommandBus\CommandBus();
        $this->resolveConsoleInput();
        $this->executeCommand();
    }

    public function resolveConsoleInput()
    {
        $consoleInput = $_SERVER['argv'];

        if (count($consoleInput) == 1) {
            $this->command = self::DEFAULT_COMMAND;
        } else {
            $this->command = $consoleInput[1];
        }
    }

    public function executeCommand()
    {
        try {
            $this->commandBus->run($this->command);
        } catch (\Exception $e) {
            fwrite(STDOUT, 'Unkown command input.');
        }
    }
}
