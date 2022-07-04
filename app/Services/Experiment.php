<?php

namespace App\Services;

class Experiment
{
    public function kk()
    {
        $eventBus = new MessageBus\CommandBus\CommandBus();
        $eventBus->addMiddleware(new SampleMiddleware());
        $eventBus->run('hello');
    }
}
