<?php

require_once __DIR__.'/../vendor/autoload.php';



use Souris\Router\Router;
use Souris\Router\Dispatcher;

$dispatcher = new Dispatcher(new Router());
$dispatcher->run();


