<?php

$app['dispatcher'] = function ($container) {
    return new \Illuminate\Events\Dispatcher;
};

$app['router'] = function($container) {
    return new \Illuminate\Routing\Router($container['dispatcher']);
};


$app['config'] = [
    'database'  => require __DIR__ . '/../config/database.php',
    'paths'     => require __DIR__ . '/../config/paths.php'
];