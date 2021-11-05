<?php

namespace Souris\Router;

use Souris\HttpFondation\Request;

class UriHandler
{
    private string $uri;

    public function __construct(private Request $request, private array $routes)
    {
        $this->uri = explode('?', $this->request->getServer('REQUEST_URI'))[0];
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function routeMatch()
    {
        foreach ($this->routes as $route => $routeParams) {
            if ($route === $this->uri) {
                return $routeParams;
            } elseif (isset($routeParams['pattern']) && preg_match($routeParams['pattern'], $this->uri, $regexParams)) {
                $params = [];
                foreach ($regexParams as $k => $v) {
                    if (!is_int($k)) $params[$k] = $v;
                }
                $routeParams['args'] = $params;
                return $routeParams;
            }
        }

        return false;
    }

    // public function getParam()
    // {
    //     if (preg_match($routeParams['pattern'], $this->uri, $regexParams)) {
    //         $params = [];
    //         foreach ($regexParams as $k => $v) {
    //             if (!is_int($k)) $params[$k] = $v;
    //         }
    //         return $params;
    //     }

    //     return false;
    // }
}
