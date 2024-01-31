<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RentalController extends AbstractController
{
    #[Route('/rental', name: 'app_rental')]
    public function index(): Response
    {
        return $this->render('rental/index.html.twig', [
            'controller_name' => 'RentalController',
        ]);
    }
}
