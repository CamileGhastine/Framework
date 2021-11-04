<?php

use Souris\Container;
use Souris\Router\Router;
use Souris\HttpFondation\Request;

$container = new Container;

$container['router'] = function ($c) use ($container) {
    return new Router($container);
};

$container['request'] = function ($c) {
    return new Request();
};