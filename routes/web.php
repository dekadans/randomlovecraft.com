<?php

/** @var \Laravel\Lumen\Routing\Router $router */
$router->get('/', function () use ($router) {
    return view('index');
});

$router->get('/about', function (\League\CommonMark\ConverterInterface $markdown) {
    $readme = file_get_contents(__DIR__ . '/../README.md');
    return $markdown->convert($readme);
});

$router->get('/api', function () use ($router) {
    return view('api');
});

$router->group(['prefix' => '/api', 'middleware' => ['cors']], function () use ($router) {
    $router->options('/{path:.*}', function () use ($router) {
        return response('', 204);
    });

    $router->get('/sentences', 'SentenceController@random');
    $router->get('/sentences/{id}', 'SentenceController@byId');

    $router->get('/books/{id}/sentences', 'SentenceController@randomByBook');
    $router->get('/books', 'BooksController@listBooks');
});
