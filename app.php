<?php

require_once __DIR__.'/vendor/autoload.php';

use Souris\Form\Form;
use Souris\Container;
use Souris\Form\Input;
use Souris\Form\Wrapper;
use Twig\Environment;
use Souris\Router\Router;
use Souris\Router\UriHandler;
use Souris\HttpFondation\Request;
use Twig\Loader\FilesystemLoader;

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

$container['twig'] = function (){
    $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/App/View');
    return new \Twig\Environment($loader);
};

$container['form'] = function (){
    return new Form();
};
$container['wrapper'] = function (){
    return new Wrapper();
};
$container['input'] = function (){
    return new Input();
};