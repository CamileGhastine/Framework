<?php

namespace App\Controller;

use Souris\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function home()
    {
        return $this->render('index.html.twig', [
            'name'  => 'Nicolas',
        ]);
    }

    public function pageTest()
    {
        $form = $this->container['form'];
        $form->add($this->container['input']);
        $submit = $this->container['input'];
        $submit->setType('submit')->setId('submit');
        $form->add($submit);

        return $this->render(
            'test.html.twig',
            [
                'form'  => $form->formView(),
            ]
        );
    }

    public function find(int $id)
    {
        return $this->render('show.html.twig', [
            'id'  => $id,
        ]);
    }
}
