<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExerciceController extends AbstractController
{
    #[Route('/exercice/{ville?marseille}/{habitants?65000}', name: 'exercice')]

    public function index(string $ville,  int $habitants): Response
    {
        return $this->render('exercice/index.html.twig',
        [
            'ville' => $ville,
            'habitants' => $habitants


        ]);
    }
}
