<?php

use App\Http\Controllers\HomeController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use Illuminate\Database\Capsule\Manager as Capsule;

$app->get('/home', HomeController::class . ':index');

$app->get('/', function (ServerRequestInterface $request, ResponseInterface $response, Twig $twig, Capsule $capsule) {
        \App\Models\User::all();

    return $twig->render($response, 'home.twig');
});
