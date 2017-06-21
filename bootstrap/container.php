<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Interop\Container\ContainerInterface;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

return [
//    'router' => DI\get(Slim\Router::class),
    \Slim\Interfaces\RouterInterface::class => function(ContainerInterface $c) {
    return $c->get('router');
    },
    Twig::class => function (ContainerInterface $c) {
        
        $twig = new Twig(
            ROOT . 'resources/views',
            [
                'cache' => false,
            ]);
        $twig->addExtension(new TwigExtension(
                $c->get('router'),
                $c->get('request')->getUri())
        );
        
        return $twig;
    },
    
    
    Capsule::class => function (ContainerInterface $c) {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => getenv('DB_CONNECTION'),
            'host'      => getenv('DB_HOST'),
            'port'      => getenv('DB_PORT'),
            'username'  => getenv('DB_USERNAME'),
            'password'  => getenv('DB_PASSWORD'),
            'database'  => getenv('DB_DATABASE'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        
        return $capsule;
    },
    
    \App\Models\Cart\Product::class => function ($c) {
        return new \App\Models\Cart\Product();
    },
];