<?php

namespace Souris;

use Souris\Container\Container;
use Souris\Router\Router;
use Souris\Router\UriHandler;

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

            $controller = $this->makeController($route['controller']);

            $content = $this->call($controller, $route);

            $this->send($content);

        } catch (\Exception $e) {
            $controller = $this->makeController('Souris\\Controller\\ErrorController');
            $content = $this->call($controller, ['action' => 'page404']);
            $this->send($content, '404');
        }
    }

    private function makeController($controller)
    {
        if (!class_exists($controller)) {
            throw new \Exception("Cette classe n'existe pas.");
        }

        return new $controller($this->container);
    }

    private function call($controller, $route)
    {
        if (!method_exists($controller, $route['action'])) {
            throw new \Exception("Cette methode n'existe pas.");
        }

        $action = $route['action'];
        $args = isset($route['args']) ? implode(',', $route['args']) : null;

        return $controller->$action($args);
    }

    private function send($content, $status = '200')
    {
        header("HTTP/1.1 $status");
        header("Content-Type: text/html, charset=UTF-8");
        echo $content;
    }
}
