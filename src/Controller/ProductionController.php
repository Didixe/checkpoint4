<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Production;
use App\Form\ClientType;
use App\Form\ProductionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductionController extends AbstractController
{
    #[Route('/production', name: 'app_production')]
    public function productionAction(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
//        $production = new Production();
//        $client = new Client();
//
//        $productionForm = $this->createForm(ProductionType::class, $production);
//        $clientForm = $this->createForm(ClientType::class, $client);
//
//        $productionForm->handleRequest($request);
//        $clientForm->handleRequest($request);
//
//        if ($productionForm->isSubmitted() && $productionForm->isValid()) {
//            // Logique de traitement pour le formulaire de production
//
//            // Persistez le client s'il n'est pas déjà persisté
//            $selectedClient = $productionForm->get('client')->getData();
//            if (!$entityManager->contains($selectedClient)) {
//                $entityManager->persist($selectedClient);
//            }
//
//            // Associez le client persisté à l'entité $production
//            $production->setClient($selectedClient);
//
//            // Persistez et flush l'entité $production
//            $entityManager->persist($production);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('app_home');
//        }
//
//        return $this->render('production/index.html.twig', [
//            'controller_name' => 'ProductionController',
//            'productionForm' => $productionForm->createView(),
//            'clientForm' => $clientForm->createView(),
//        ]);
//    }
        $production = new Production();
        $client = new Client();

        $productionForm = $this->createForm(ProductionType::class, $production);
        $clientForm = $this->createForm(ClientType::class, $client);

        $form = $this->createFormBuilder()
            ->add('client', ClientType::class, ['data' => $client])
            ->add('production', ProductionType::class, ['data' => $production])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $clientData = $form->get('client')->getData();
            $productionData = $form->get('production')->getData();

            // Persistez le client s'il n'est pas déjà persisté
            if (!$entityManager->contains($clientData)) {
                $entityManager->persist($clientData);
            }

            // Associez le client persisté à l'entité $production
            $productionData->setClient($clientData);

            // Persistez et flush l'entité $production
            $entityManager->persist($productionData);
            $entityManager->flush();


            return $this->redirectToRoute('app_home');
        }

        return $this->render('production/index.html.twig', [
            'controller_name' => 'ProductionController',
            'form' => $form->createView(),
        ]);
    }
}
