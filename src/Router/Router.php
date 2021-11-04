<?php


namespace Souris\Router;




class Router
{
    public function run()
    {

        $url = $_SERVER['REQUEST_URI'];

        if ($url === '/') {
            $controller = 'App\Controller\HomeController';
            $action = 'home';
        } else {
            $UriTerms = explode('/', $url);
            $controller = 'App\Controller\\' . ucfirst($UriTerms[1]) . 'Controller';
            $action = $UriTerms[2];
        }
 
        $controller = new $controller();
        $controller->$action();
    }
}
