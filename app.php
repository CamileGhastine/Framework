<?php

require_once __DIR__.'/vendor/autoload.php';

use Souris\Container;
use Souris\Router\Router;
use Souris\HttpFondation\Request;
use Souris\Router\UriHandler;

$container = new Container;


$container['request'] = function () {
    return new Request();
};

$container['routes'] = require_once __DIR__ . "/config/routes.php";

$container['router'] = function () {
    return new Router();
};

$container['uriHandler'] = function () use ($container) {
    return new UriHandler($container['request'], $container['routes']);
};

