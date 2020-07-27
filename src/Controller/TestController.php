<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{

    public function toto(string $id)
    {
        dump("test");
        return $this->render('lucky/number.twig', ['number' => $id]);
    }

}
