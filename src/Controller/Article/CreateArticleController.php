<?php

namespace App\Controller\Article;


use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateArticleController extends AbstractController
{
    /**
     * @Route("/admin/article/creer", name="creer_article")
    
     */
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $auteur = $this->getUser();

            $article->setAuteur($auteur);
            
            $em->persist($article);

            $em->flush();

            $this->addFlash('succes', "L'article : " .$article->getTitre(). " a bien été enregistré.");

            return $this->redirectToRoute('creer_article');
        }

        return $this->render("article/creer.html.twig", [
            'formArticle' => $form->createView()
        ]);
    }
}
