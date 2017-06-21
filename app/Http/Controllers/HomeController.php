<?php

namespace App\Http\Controllers;

use App\Models\Cart\Product;
use App\Models\User;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

/**
 * @property  \Slim\Views\Twig $view
 * @property  \Slim\Router     router
 */
class HomeController
{
    
    /**
     * Index Page
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param \Slim\Views\Twig                         $view
     * @param \App\Models\Cart\Product                 $product
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @internal param \Slim\Views\Twig $twig
     * @internal param $args
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response, Product $product, Twig $view)
    {
        $products = $product->limit(10)->get();
        
        return $view->render($response->withStatus(500), 'home.twig', [
            'products' => $products,
        ]);
    }
}
