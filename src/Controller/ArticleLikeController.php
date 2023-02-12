<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleLikeController extends ArticleController
{
    #[Route('/articles/{id<\d+>}/like/{type<like|dislike>}', methods: 'POST', name: 'app_articlelike_like')]
    public function like($id, $type, LoggerInterface $logger)
    {
        if($type === 'like')
        {
            $likes = rand(100, 200);
            $logger->info('Поставили лайк');
        } else {
            $likes = rand(0, 99);
            $logger->info('Поставили дизлайк');
        }
        return $this->json(['likes' => $likes]);

    }

}