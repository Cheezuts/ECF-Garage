<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentaireType;
use App\Service\CommentaireService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, CommentaireService $commentaireService): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentaireType::class, $comment);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $comment = $form->getData();
            $commentaireService->persistCommentaire($comment);

            return $this->redirectToRoute('app_home');
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}
