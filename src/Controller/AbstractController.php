<?php

namespace Souris\Controller;

use Souris\Container\Container;

abstract class AbstractController
{
    public function __construct(protected Container $container)
    {
    }

    public function render(string $view, array $params = [])
    {
        $twig = $this->container['twig'];

        $baseTwig = $this->findBaseTwig($twig, get_class($this), debug_backtrace()[1]['function']);

        $template = $twig->load($this->container['config'][$baseTwig]);
        $template = $twig->load($view);

        return $template->render($params);
    }

    private function findBaseTwig($twig, $class, $method)
    {
        $class = explode('\\', $class);
        $class = end($class);
        $baseTwig = $class . '.' . $method;

        return  isset($this->container['config'][$baseTwig]) ? $class . '.' . $method : 'default';
    }
}
