<?php

namespace App\Controller\Article;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SupprimerArticleController extends AbstractController
{
    /**
     *@Route("article/supprimer/{id}", name="supprimer_article")
     */

    public function supprimer(int $id, ArticleRepository $articleRepository, EntityManagerInterface $em)
    {
        $article = $articleRepository->find($id);

        if (!$article) {
            $this->addFlash("danger", "Cet article n'existe pas");
            return $this->redirectToRoute("liste_article");
        }

        $em->remove($article);
        $em->flush();

        $this->addFlash("success", "L'artcile a bien été supprimé");
        return $this->redirectToRoute("liste_article");
    }
}
