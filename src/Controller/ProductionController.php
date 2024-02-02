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

            if (!$entityManager->contains($clientData)) {
                $entityManager->persist($clientData);
            }

            $productionData->setClient($clientData);

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
