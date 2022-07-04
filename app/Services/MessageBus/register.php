<?php

use App\Services\HelloWorldCommandExecutedEvent;
use App\Services\HelloWorldCommand;
use App\Services\PrintCommandExecutedListener;

return [
    'events' => [
        HelloWorldCommandExecutedEvent::class => [
            PrintCommandExecutedListener::class
        ],
    ],

    'commands' => [
        'hello' => HelloWorldCommand::class
    ],
];
