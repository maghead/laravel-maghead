<?php

return [
    'cli' => [
        'bootstrap' => base_path('bootstrap/autoload.php'),
    ],
    'schema' => [
        'auto_id' => true,
        'base_model' => \Maghead\Runtime\Model::class,
        'base_collection' => \Maghead\Runtime\Collection::class,
        'paths' => [
            app_path('Model'),
        ],
    ],
    'instance' => [
        'local' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'connection_options' => [],
        ],
    ],
    'databases' => [
        'master' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'connection_options' => [],
        ],
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'connection_options' => [],
        ],
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'schema' => 'public',
            'sslmode' => 'prefer',
            'connection_options' => [],
        ],
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'query_options' => [
                'quote_column' => true,
                'quote_table' => true,
            ],
        ],
    ],
];
