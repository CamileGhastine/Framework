<?php

return [
    '/@'     => ['controller' => 'App\\Controller\\HomeController', 'action' => 'home'],
    '/test'     => ['controller' => 'App\\Controller\\HomeController', 'action' => 'pageTest'],
    '/test/post/{#^\d+$# id}'     => ['controller' => 'App\\Controller\\HomeController', 'action' => 'find'],
];