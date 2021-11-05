<?php

namespace Souris\Controller;

use Souris\Container;

abstract class AbstractController
{
    public function __construct(private Container $container)
    {

    }

    public function render(string $view, array $params=[])
    {
        extract($params);
        ob_start();
        require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'App'. DIRECTORY_SEPARATOR . 'View'. DIRECTORY_SEPARATOR . $view . '.php');
        $content = ob_get_clean();
        require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'App'. DIRECTORY_SEPARATOR . 'View'. DIRECTORY_SEPARATOR . 'base.php');
    }
}