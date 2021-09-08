<?php

namespace App\Controller\Article;

use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DetailArticleController extends AbstractController
{
    /**
     * @Route("article/detail/{id}", name="detail_article")
     */

     public function detail(int $id, ArticleRepository $articleRepository)
     {
         $article = $articleRepository->find($id);

         if(!$article)
         {
             $this->addFlash("danger", "Cet article nexiste pas");
             return $this->redirectToRoute('liste_article');
         }

         return $this->render("article/detail.html.twig", [
             'article' => $article
         ]);
     }
}