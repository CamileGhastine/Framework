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

    public function find(int $id)
    {
        echo "Test ok: $id";
    }
}