<?php

use App\Http\Controllers\HomeController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

$app->get('/home', HomeController::class . ':index');

$app->get('/', function (ServerRequestInterface $request, ResponseInterface $response, Twig $twig) {
    return $twig->render($response, 'home.twig');
});