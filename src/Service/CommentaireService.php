<?php 
namespace App\Service;

use App\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;


class CommentaireService
{
    private $manager;
    private $flash;


    public function __construct(EntityManagerInterface $manager, FlashBagInterface $flash)
    {
        $this->manager = $manager;
        $this->flash = $flash;
    }

    public function persistCommentaire (Comment $comment): void
{
    $comment->setIsPublished(false);
                $this->manager->persist($comment);
                $this->manager->flush();
                $this->flash->add('success', 'Votre commentaire a bien été envoyé, il sera publié après validation');
}
    
}



?>