<?php
namespace App\Controller;
use App\Controller\Service\MarkdownParser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ArticleController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(Environment $twig, $slackUrl){
        dd($slackUrl);
        //dd($this->getParameter('app.support_email'));
        $thml = $twig->render('articles/homepage.html.twig');
        return new Response($thml);
        //return $this->render('articles/homepage.html.twig');
    }

    #[Route('/articles/{slug}', name: 'app_article_show')]
    public function show($slug, MarkdownParser $markdownParcer)
    {
        $comments = [
            'Text',
            'Text2',
            'Text3',
            ];

        $articleContent = <<<EOF
Lorem Lorem ipsum **красная точка** dolor sit amet, consectetur adipiscing elit, sed
        do <p>eiusmod</p> tempor incididunt Сметанка ut labore et dolore magna aliqua.
        Purus viverra accumsan in nisl. Diam vulputate ut pharetra sit amet aliquam. Faucibus a
        pellentesque sit amet porttitor eget dolor morbi non. Est ultricies integer quis auctor
        elit sed. Tristique nulla aliquet enim tortor at. Tristique et egestas quis ipsum. Consequat semper viverra nam
        libero. Lectus quam id leo in vitae turpis. In eu mi bibendum neque egestas congue
        quisque egestas diam. Красная точка blandit turpis cursus in hac habitasse platea dictumst quisque.
        
Ullamcorper malesuada proin libero nunc consequat interdum varius sit amet. Odio pellentesque
        diam volutpat commodo sed egestas. Eget nunc lobortis mattis aliquam. Cursus vitae congue
        mauris rhoncus aenean vel. Pretium viverra suspendisse potenti nullam ac tortor vitae.
        A pellentesque sit amet porttitor eget dolor. Nisl nunc mi ipsum faucibus vitae. Purus sit amet
        luctus venenatis lectus magna fringilla urna. Sit amet tellus cras adipiscing enim. Euismod
        nisi porta lorem mollis aliquam ut porttitor leo.

Morbi blandit cursus risus at ultrices. Adipiscing vitae proin sagittis nisl rhoncus mattis
        rhoncus. Sit amet commodo nulla facilisi. In fermentum et sollicitudin ac orci phasellus
        egestas tellus. Sit amet risus nullam eget felis. Dapibus ultrices in iaculis nunc sed
        augue lacus viverra. Dictum non consectetur a erat nam at. Odio ut enim blandit volutpat
        maecenas. Turpis cursus in hac habitasse platea. Etiam erat velit scelerisque in. Auctor
        neque vitae tempus quam pellentesque nec nam aliquam. Odio pellentesque diam volutpat commodo
        sed egestas egestas. Egestas dui id ornare arcu odio ut.
EOF;

        $articleContent = $markdownParcer->parce($articleContent);

        return $this->render('/articles/show.html.twig', [
            'article' => ucwords(str_replace('-', ' ', $slug)),
            'articleContent' => $articleContent,
            'comments' => $comments,
        ]);
    }

    #[Route('/blog', name: 'blog_list')]
    public function list(): Response
    {
        return new Response('Страничка блог');
    }

}