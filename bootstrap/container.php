<?php

use Interop\Container\ContainerInterface;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

return [
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
];