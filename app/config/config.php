<?php

return [

    'credentials' => [
        'url'      => '',
        'username' => '',
        'password' => '',
    ],

    'csv' => [
        'files' => [
            'example' => __DIR__ . '/../../resources/data/example.csv',
        ],
    ],

    'cache.output_dir' => __DIR__ . '/../../resources/cache',

    'mappings' => [
        'php'  => __DIR__ . '/../../resources/data/mapping.php',
        'json' => __DIR__ . '/../../resources/data/mapping.json',
    ],
];
