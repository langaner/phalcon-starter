<?php
return [
    'default' => 'file',
    'stores' => [
        'apc' => [
            'lifetime' => 172800,
            'prefix' => 'default'
        ],
        'file' => [
            'lifetime' => 172800,
            'cacheDir' => BASE . '/storage/cache/',
        ],
        'memcached' => [
            'lifetime' => 172800,
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
            'lifetime' => 172800,
            'host' => 'localhost',
            'port' => 6379,
            'auth' => 'default',
            'persistent' => false,
            'index' => 0,
        ]
    ],
    'prefix' => 'phalcon'
];