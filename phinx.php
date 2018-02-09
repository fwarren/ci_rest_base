<?php

include "vendor/autoload.php";

// load our environment files - used to store credentials & configuration
(new Dotenv\Dotenv(__DIR__))->load();

return
    [
        'paths' => [
          'migrations' => 'db/migrations',
          'seeds' => 'db/seeds'
        ],
        'environments' =>
            [
                'default_database' => 'development',
                'default_migration_table' => 'phinxlog',
                'development'      =>
                    [
                        'adapter' => 'mysql',
                        'host' => $_ENV['DB_HOST'],
                        'name' => $_ENV['DB_DATABASE'],
                        'user' => $_ENV['DB_USERNAME'],
                        'pass' => $_ENV['DB_PASSWORD'],
                        'port' => 3306,
                        'charset' => 'utf8',
                        'collation' => 'utf8_unicode_ci',
                    ],
                'staging' =>
                    [
                        'adapter' => 'mysql',
                        'host' => $_ENV['DB_HOST'],
                        'name' => $_ENV['DB_DATABASE'],
                        'user' => $_ENV['DB_USERNAME'],
                        'pass' => $_ENV['DB_PASSWORD'],
                        'port' => 3306,
                        'charset' => 'utf8',
                        'collation' => 'utf8_unicode_ci',
                    ],
                'production' =>
                    [
                        'adapter' => 'mysql',
                        'host' => $_ENV['DB_HOST'],
                        'name' => $_ENV['DB_DATABASE'],
                        'user' => $_ENV['DB_USERNAME'],
                        'pass' => $_ENV['DB_PASSWORD'],
                        'port' => 3306,
                        'charset' => 'utf8',
                        'collation' => 'utf8_unicode_ci',
                    ],
            ],
    ];

