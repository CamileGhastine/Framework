<?php

require_once __DIR__.'/../vendor/autoload.php';

/**
 * @author: 
 * @description: framework PHP
 */

use App\Controller\HomeController;
use App\Controller\ErrorController;

$homeController = new HomeController();

// var_dump($_SERVER);
$url = $_SERVER['REQUEST_URI'];

if ($url === '/') {

    $homeController->home();

}elseif ($url === '/pagetest') {

    $homeController->pageTest();

}else{
    $errorController = new ErrorController();
    $errorController->page404();
}


// $dispatcher->run();


