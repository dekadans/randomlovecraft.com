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
    return view('index');
});


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('sentence', 'SentenceController@all');
    $router->get('sentence/{book}', 'SentenceController@book');

    $router->get('books', 'BooksController@listBooks');
});
