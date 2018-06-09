<?php

require "autoload.php";

use App\Core\{Container, Router};

$container = Container::getInstance();
App\Core\Facade::setContainer($container);

$container->bind('router', function () {
    return new Router();
});

require $folderRoot.'routes.php';
