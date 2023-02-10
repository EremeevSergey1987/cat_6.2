<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(){
        return new Response('Страничка1');
    }

    /**
     * @Route("/articles/{slug}")
     */

    public function show($slug)
    {
        $comments = [
            'Text',
            'Text2',
            'Text3',
            ];

        return $this->render('/articles/show.html.twig', [
            'article' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments
        ]);
        //return new Response(sprintf('Page - %s', ucwords(str_replace('-', ' ', $slug))));
    }

}