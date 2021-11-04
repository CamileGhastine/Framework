<?php
namespace Souris\Router;

use App\Controller\ErrorController;

class Dispatcher
{

    public function __construct(
        private Router $router
        )
    {}

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