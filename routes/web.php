<?php

/** @var \Laravel\Lumen\Routing\Router $router */
$router->get('/', function () use ($router) {
    return view('index');
});

$router->get('api', function () use ($router) {
    return view('api');
});

$router->group(['prefix' => 'api', 'middleware' => ['cors']], function () use ($router) {
    $router->get('sentences', 'SentenceController@random');
    $router->get('sentences/{id}', 'SentenceController@byId');

    $router->get('books/{book}/sentences', 'SentenceController@randomByBook');
    $router->get('books', 'BooksController@listBooks');
});
