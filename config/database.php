<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

    'default' => env('DB_DEFAULT', 'postgres'),

     'connections' => [
         'sqlite_testing' => [
             'driver' => 'sqlite',
             'database' => database_path('testing.sqlite'),
             'prefix' => '',
         ],

         'postgres' => [
         'driver'    => 'pgsql',
         'host'      => env('DB_HOST', 'localhost:8001'),
         'database'  => env('DB_DATABASE', 'forge'),
         'username'  => env('DB_USERNAME', 'forge'),
         'password'  => env('DB_PASSWORD', ''),
         'charset'   => 'utf8',
         'collation' => 'utf8_unicode_ci',
         'prefix'    => '',
         'strict'    => false,
         ],
     ],
];
