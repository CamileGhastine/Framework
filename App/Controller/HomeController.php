<?php

namespace App\Controller;

use Souris\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function home()
    {
        $this->render('index', [
            'name'  => 'Nicolas',
        ]);
    }

    public function pageTest()
    {
        echo "Test ok";
    }
}