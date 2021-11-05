<?php

namespace Souris\Controller;

use Souris\Container;

abstract class AbstractController
{
    public function __construct(protected Container $container)
    {
    }

    public function render(string $view, array $params=[])
    {
        $twig = $this->container['twig'];

        $template = $twig->load('base.html.twig');
        $template = $twig->load($view);
        echo $template->render($params);
    }
}