<?php
    require __DIR__.'/vendor/autoload.php';

    $app = new Core\Application();

    if (file_exists(__DIR__ . '/.env')) {
        Dotenv::load(__DIR__ . '');
    }

    require __DIR__ . '/core/services.php';

    try {
        Illuminate\Support\Facades\Facade::setFacadeApplication($app);
        $app->startApplication();
    } catch (Exception $exception) {
        $app->catchGlobalExceptions($exception);
    }