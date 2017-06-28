<?php

return [
    'default' => 'local',
    'cloud' => 's3',
    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => '',
        ],
        's3' => [
            'driver' => 's3',
            'key' => '',
            'secret' => '',
            'region' => '',
            'bucket' => '',
        ],
    ],
];