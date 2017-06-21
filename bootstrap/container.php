<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Cart\Product;
use Interop\Container\ContainerInterface;
use Slim\Interfaces\RouterInterface;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

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

return [
    Capsule::class => function (ContainerInterface $c) use ($capsule) {
        
        return $capsule;
    },
    
    RouterInterface::class => function (ContainerInterface $c) {
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
    
    Product::class => function ($c) {
        return new Product();
    },
];