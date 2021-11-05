<?php

namespace Souris\Router;

use Souris\HttpFondation\Request;

class UriHandler
{
    private string $uri;

    public function __construct(private Request $request, private array $routes)
    {
    }

    public function getUri()
    {
        $this->uri = explode('?', $this->request->getServer('REQUEST_URI'))[0];
        return $this->uri;
    }

    public function AnalyseRoute()
    {
        foreach ($this->routes as $route => $v) {
            $this->analyse($route);
        }
    }

    private function analyse($route)
    {
        $uriParams = explode('/', $this->uri);
        $routesParams = explode('/', $route);

        for ($i = 1; $i < count($uriParams); $i++) {
            $j = 1;
            echo $uriParams[$i] .'==='. $routesParams[2] .'<br>';
            if ($uriParams[$i] === $routesParams[$j]) {
            
            }
            // if (preg_match('#\{(.)+\}$#', $routesParams[$j])) {
            //     echo '{{';
            // }
            $j++;
        }
        echo '<br>';
    }

    private function explode()
    {
        return explode();
    }
}
