<?php

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\MarkdownConverterInterface;

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->withFacades();

$app->withEloquent();


$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->bind(MarkdownConverterInterface::class, function () {
    $env = Environment::createCommonMarkEnvironment();
    $env->addExtension(new ExternalLinkExtension());
    $config = [
        'external_link' => [
            'internal_hosts' => ['randomlovecraft.com', 'f.tthe.se'],
            'open_in_new_window' => true,
        ]
    ];

    return new CommonMarkConverter($config, $env);
});

$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class,
    'log' => \App\Http\Middleware\LogActivity::class,
    'cors' => \App\Http\Middleware\CorsMiddleware::class
]);

// $app->register(App\Providers\AppServiceProvider::class);
// $app->register(App\Providers\AuthServiceProvider::class);

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;
