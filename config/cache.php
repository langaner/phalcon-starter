<?php
return [
    'default' => 'file',
    'stores' => [
        'apc' => [],
        'file' => [
            'path' => '',
        ],
        'memcached' => [
            'persistent' => '',
            'sasl' => [],
            'options' => [],
            'servers' => [
                [
                    'host' => '127.0.0.1',
                    'port' => 11211,
                    'weight' => 100,
                ],
            ],
        ],
        'redis' => [
            'connection' => 'default',
        ]
    ],
    'prefix' => 'phalcon',
];