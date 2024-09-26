<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function articleAll(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findBy(
            [],
            ['createdAt' => 'DESC']
        );

        return $this->render('article/all.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles,
        ]);
    }

    #[Route('/article/{id}', name: 'article_show', methods: ['GET'])]
    public function show(ArticleRepository $articleRepository, int $id): Response
    {
        $article = $articleRepository->findOneBy(['id' => $id]);

        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
