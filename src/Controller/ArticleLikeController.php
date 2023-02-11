<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleLikeController extends ArticleController
{
    #[Route('/articles/{id<\d+>}/like/{type<like|dislike>}', methods: 'POST')]
    public function like($id, $type)
    {
        if($type === 'like')
        {
            $likes = rand(122, 999);
        } else {
            $likes = rand(0, 120);
        }
        return $this->json(['likes' => $likes]);

    }

}