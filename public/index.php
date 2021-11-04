<?php

require_once __DIR__.'/../vendor/autoload.php';

/**
 * @author: 
 * @description: framework PHP
 */

use App\Controller\HomeController;

$homeController = new HomeController();

$homeController->home();

// $dispatcher->run();


