<?php

namespace App\Services;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class EmailService{
    private $mailer;
    private $twig;

    public function __construct(MailerInterface $mailer, Environment $twig){
        $this->mailer = $mailer;
        //permet au service d'utiliser les fonctionnalités de rendu de Twig
        $this->twig = $twig;
    }

    public function sendingNotification($client, $comment){

        $email = (new Email())
            ->from('wilder@wildcodeschool.fr')
            ->to('wilder@wildcodeschool.fr')
            ->subject('Nouveau commentaire enregistré')
            ->html($this->twig->render('email/comment_notification.html.twig', [
                'client' => $client,
                'comment' => $comment,
            ]));

        $this->mailer->send($email);
    }
}