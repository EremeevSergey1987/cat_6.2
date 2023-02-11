<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(){
        return $this->render('articles/homepage.html.twig');
    }

    #[Route('/articles/{slug}', name: 'app_article_show')]
    public function show($slug)
    {
        $comments = [
            'Text',
            'Text2',
            'Text3',
            ];

        dump($slug, $this);

        return $this->render('/articles/show.html.twig', [
            'article' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments
        ]);
        //return new Response(sprintf('Page - %s', ucwords(str_replace('-', ' ', $slug))));
    }

    #[Route('/blog', name: 'blog_listtt')]
    public function list(): Response
    {
        return new Response('Страничка блог');
    }

}