<?php

return [
    'cli' => [
      'bootstrap' => 'tests/bootstrap.php',
    ],
    'schema' => [
        'auto_id' => true,
        'base_model' => \Maghead\Runtime\BaseModel::class,
        'base_collection' => \Maghead\Runtime\BaseCollection::class,
        'paths' => [
            'tests',
        ],
    ],
    'instance' => [
        'local' => [
            'dsn' => 'mysql:host=localhost',
            'user' => 'root',
        ],
        'databases' => [
            'master' => [
                'dsn' => 'sqlite::memory:',
                'query_options' => [
                    'quote_column' => true,
                    'quote_table' => true,
                ],
            ],
            'mysql' => [
                'dsn' => 'mysql:host=localhost;dbname=testing',
                'user' => 'root',
            ],
            'pgsql' => [
                'dsn' => 'pgsql:host=localhost;dbname=testing',
                'user' => 'postgres',
            ],
        ],
    ],
];
