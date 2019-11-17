<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/** @var \Laravel\Lumen\Routing\Router $router */
$router->get('/', function () use ($router) {
    return view('index', [
        'apiKey' => env('DEFAULT_KEY')
    ]);
});

$router->get('api/info', function () use ($router) {
    return view('api');
});

$router->group(['prefix' => 'api', 'middleware' => ['auth', 'log']], function () use ($router) {
    $router->get('sentences', 'SentenceController@random');
    $router->get('sentences/{id}', 'SentenceController@byId');

    $router->get('books/{book}/sentences', 'SentenceController@randomByBook');
    $router->get('books', 'BooksController@listBooks');
});
