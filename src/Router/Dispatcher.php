<?php
namespace Souris\Router;

use Souris\Container;
use App\Controller\ErrorController;

class Dispatcher
{
    private Router $router;

    public function __construct(
        private Container $container
        )
    {
        $this->router = $container['router'];
    }

    public function run()
    {
        $this->router->handleURI();
        try{
            if (
                !class_exists($this->router->getController())
                || !method_exists($this->router->getController(), $this->router->getAction())
            ){
                throw new \Exception("not found");
            }

            $controller = new ($this->router->getController())();
            $action = $this->router->getAction();
            $controller->$action();
            
        }catch(\Exception $e){
            $controller = new ErrorController();
            $controller->page404();
        }
    }
}