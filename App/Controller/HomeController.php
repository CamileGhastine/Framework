<?php

namespace App\Controller;

use Souris\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function home()
    {
        $this->render('index.html.twig', [
            'name'  => 'Nicolas',
        ]);
    }

    public function pageTest()
    {
        $this->render('test.html.twig');
    }

    public function find(int $id)
    {
        $this->render('show.html.twig', [
            'id'  => $id,
        ]);
    }
}