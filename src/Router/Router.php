<?php


namespace Souris\Router;

use Souris\Container;
use Souris\HttpFondation\Request;


class Router
{
    public function getRoute(string $uri, array $routes, UriHandler $uriHandler)
    {
        if ($uriHandler->routeMatch()) {
            return $uriHandler->routeMatch();
        }

        return false;
    }
}
