<?php


namespace Souris\Router;


use App\Controller\HomeController;
use App\Controller\ErrorController;

class Router
{
    public function run()
    {
        $url = $_SERVER['REQUEST_URI'];

        if ($url === '/') {
            $homeController = new HomeController();
            $homeController->home();
        } elseif ($url === '/pagetest') {
            $homeController = new HomeController();
            $homeController->pageTest();
        } else {
            $errorController = new ErrorController();
            $errorController->page404();
        }
    }
}