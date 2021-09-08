<?php

namespace App\Controller\Article;

use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListeArticleController extends AbstractController
{
    /**
     * @Route("/article/liste", name="liste_article")
     */

    public function list(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->findAll();

        return $this->render("article/list.html.twig", [
            'articles' => $articles
        ]);
    }
}
