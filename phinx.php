<?php

require_once './bootstrap/app.php';

$pdo = $app->getContainer()->get(\Illuminate\Database\Capsule\Manager::class)->getConnection()->getPdo();

return [
    'paths'                => [
        'migrations' => 'database/migrations',
        'seeds'      => 'database/seeds',
    ],
    'migration_base_class' => 'App\Database\Migrations\Migration',
    'templates'            => [
        'file' => 'app/Database/Migrations/MigrationStub.php.dist',
    ],
    'environments'         => [
        'default_migration_table' => 'migrations',
        'default_database'        => 'development',
        'development'             => [
            'name'       => getenv('DB_DATABASE'),
            'connection' => $pdo,
        ],
//        'production'              => [
//            'adapter'   => $config['driver'],
//            'host'      => $config['host'],
//            'name'      => $config['dbname'],
//            'user'      => $config['username'],
//            'pass'      => $config['password'],
//            'port'      => $config['port'],
//            'charset'   => 'utf8',
//            'collation' => 'utf8_unicode_ci',
//            'prefix'    => '',
//        ],
    ],
];