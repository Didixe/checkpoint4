<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Comment;
use App\Form\ClientType;
use App\Form\CommentType;
use App\Services\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class CommentController extends AbstractController
{
    #[Route('/comment', name: 'app_comment')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        EmailService $emailService
    ): Response
    {
        $comment = new Comment();
        $client = new Client();

        $commentForm = $this->createForm(CommentType::class, $comment);
        $clientForm = $this->createForm(ClientType::class, $client);

        $form = $this->createFormBuilder()
            ->add('client', ClientType::class, ['data' => $client])
            ->add('comment', CommentType::class, ['data' => $comment])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $clientData = $form->get('client')->getData();
            $commentData = $form->get('comment')->getData();

            if (!$entityManager->contains($clientData)) {
                $entityManager->persist($clientData);
            }

            $commentData->setClient($clientData);

            $entityManager->persist($commentData);
            $entityManager->flush();

            $emailService->sendingNotification($clientData, $commentData);

            $this->addFlash('success', 'Votre commentaire a bien été pris en compte. Nous vous recontacterons dans les plus brefs délais.');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
            'form' => $form->createView(),
        ]);
    }
}
