<?php
namespace Souris\Router;

use Souris\Container;
use Souris\Controller\ErrorController;

class Dispatcher
{
    private Router $router;

    private string $uri;
    private array $routes;

    public function __construct(
        private Container $container
        )
    {
        $this->request = $container['request'];
        $this->router = $container['router'];
        $this->routes = $container['routes'];
    }

    public function run()
    {
        $this->uri = $this->request->getServer('REQUEST_URI');

        $route = $this->router->getRoute($this->uri, $this->routes);
        try{
            if (!$route) {
                throw new \Exception("not found");
            }

            if (
                !class_exists($route['controller'])
                || !method_exists($route['controller'], $route['action'])
            ){
                throw new \Exception("Cette classe ou methide n'existe pas.");
            }

            $controller = new $route['controller'];
            $action = $route['action'];
            $controller->$action();

        }catch(\Exception $e){
            $controller = new ErrorController();
            $controller->page404();
        }
    }
}