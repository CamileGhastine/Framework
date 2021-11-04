<?php


namespace Souris\Router;

use App\Controller\ErrorController;
use Souris\HttpFondation\Request;


class Router
{
    private string $url;
    private string $controller;
    private string $action;
    private Request $request;

    public function __construct()
    {
        $this->request = new Request;
        $this->url = $this->request->getServer('REQUEST_URI');
    }
    public function handleURI()
    {

        if ($this->url === '/') {
            $this->controller = 'App\Controller\HomeController';
            $this->action = 'home';
        } else {
            $UriTerms = explode('/', $this->url);
            $this->controller = 'App\Controller\\' . ucfirst($UriTerms[1]) . 'Controller';
            $this->action = $UriTerms[2]?? '';
        }

        return $this;
        
    }

    /**
     * Get the value of controller
     */ 
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set the value of controller
     *
     * @return  self
     */ 
    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Get the value of action
     */ 
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set the value of action
     *
     * @return  self
     */ 
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }
}
