<?php


namespace Souris\Router;

use Souris\Container;
use Souris\HttpFondation\Request;

/**
 * Class Router
 * @package Souris\Router
 */
class Router
{
    public function getRoute(UriHandler $uriHandler)
    {
        if ($uriHandler->routeMatch()) {
            return $uriHandler->routeMatch();
        }

        return false;
    }
}
