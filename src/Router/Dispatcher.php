<?php
namespace Souris\Router;

use Souris\Container;
use Souris\HttpFondation\Request;
use Souris\Controller\ErrorController;

class Dispatcher
{
    private Router $router;

    private string $uri;
    private array $routes;
    private UriHandler $uriHandler;
    private Request $request;

    public function __construct(
        private Container $container
        )
    {
        $this->request = $container['request'];
        $this->router = $container['router'];
        $this->routes = $container['routes'];
        $this->uriHandler = $container['uriHandler'];
    }

    public function run()
    {
        $uri = $this->uriHandler->getUri();
        $this->uriHandler->analyseRoute();

        $route = $this->router->getRoute($uri, $this->routes);

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