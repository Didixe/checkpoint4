<?php

namespace App\Controller;

use App\Entity\Purchase;
use App\Repository\InstrumentRepository;
use App\Repository\PurchaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PurchaseController extends AbstractController
{
    #[Route('/purchase', name: 'app_purchase')]
    public function index(PurchaseRepository $purchaseRepository, InstrumentRepository $instrumentRepository): Response
    {

        $instruments = $instrumentRepository->findAll();

        return $this->render('purchase/index.html.twig', [
            'controller_name' => 'PurchaseController',
            'instruments' => $instruments,
        ]);
    }
}
