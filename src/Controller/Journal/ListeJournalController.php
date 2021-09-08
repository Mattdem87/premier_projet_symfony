<?php

namespace App\Controller\Journal;

use App\Repository\JournalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeJournalController extends AbstractController
{
    #[Route('/liste/journal', name: 'liste_journal')]

    public function list(JournalRepository $journalRepository): Response
    {
        $journaux = $journalRepository->findAll();

        return $this->render('journal/journal_list.html.twig', [
            'journaux' => $journaux
        ]);
    }
}
