<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home/{prenom?World}/{age?20}', name: 'home')]

    public function index(string $prenom, int $age): Response
    {
        $cat = "tu es le meilleur";

        $pokemons = [
            'pikachu',
            'salameche',
            'florizard'
        ];

        $ninja = [
            'village' => 'konoha',
            'renard' => 'Kyubi'
        ];

        return $this->render(
            'home/index.html.twig',
            [
                'prenom' => $prenom,
                'cat' => $cat,
                'age' => $age,
                'pokemons' => $pokemons,
                'ninja' => $ninja

            ]
        );
    }
}
