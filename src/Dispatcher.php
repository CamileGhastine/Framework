<?php

namespace Souris;

use Souris\Container;
use Souris\Router\Router;
use Souris\Router\UriHandler;
use Souris\Controller\ErrorController;

class Dispatcher
{
    private Router $router;
    private array $routes;
    private UriHandler $uriHandler;

    public function __construct(
        private Container $container
    ) {
        $this->router = $container['router'];
        $this->routes = $container['routes'];
        $this->uriHandler = $container['uriHandler'];
    }

    public function run()
    {
        $uri = $this->uriHandler->getUri();
        $route = $this->router->getRoute($uri, $this->routes, $this->container['uriHandler']);



        try {
            if (!$route) {
                throw new \Exception("not found");
            }

            if (
                !class_exists($route['controller'])
                || !method_exists($route['controller'], $route['action'])
            ) {
                throw new \Exception("Cette classe ou methide n'existe pas.");
            }

            $controller = new $route['controller']($this->container);
            $action = $route['action'];
            $args = isset($route['args'])? implode(',', $route['args']) : null;

            $controller->$action($args);
        } catch (\Exception $e) {
            $controller = new ErrorController();
            $controller->page404();
        }
    }
}
