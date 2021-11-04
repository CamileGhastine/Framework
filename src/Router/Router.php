<?php


namespace Souris\Router;

use Souris\Container;
use Souris\HttpFondation\Request;


class Router
{

    public function getRoute(string $uri, array $routes)
    {
        if (isset($routes[$uri])) {
            return $routes[$uri];
        }
        return false;
    }

}
