<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app.php';

use Souris\Router\Dispatcher;

$dispatcher = new Dispatcher($container);
$dispatcher->run();


