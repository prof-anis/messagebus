<?php

use App\Services\SampleListener;

return [
    'events' => [
        'hello' => [
            SampleListener::class,
        ],
    ],

    'commands' => [
        'hello' => SampleListener::class
    ],
];
