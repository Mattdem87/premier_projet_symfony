<?php

namespace App\Controller\Journal;

use App\Entity\Journal;
use App\Form\JournalType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateJournalController extends AbstractController
{
    #[Route('/admin/create/journal', name: 'create_journal')]

    public function create(Request $request, EntityManagerInterface $jl): Response
    {
        $journal = new Journal();

        $form = $this->createForm(JournalType::class, $journal);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $jl->persist($journal);

            $jl->flush();

            $this->addFlash('succes', "Le journal : " . $journal->getNom() . " a bien été enregistrer");

            return $this->redirectToRoute('create_journal');
        }

        return $this->render('journal/creer_journal.html.twig', [
            'formJournal' => $form->createView()
        ]);
    }
}
