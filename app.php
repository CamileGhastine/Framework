<?php

require_once __DIR__.'/vendor/autoload.php';

use Souris\Container;
use Souris\Router\Router;
use Souris\HttpFondation\Request;

$container = new Container;


$container['request'] = function ($c) {
    return new Request();
};

$container['routes'] = require_once __DIR__ . "/config/routes.php";

$container['router'] = function ($c) {
    return new Router();
};