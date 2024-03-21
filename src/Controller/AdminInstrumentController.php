<?php

namespace App\Controller;

use App\Entity\Instrument;
use App\Form\InstrumentType;
use App\Repository\InstrumentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
#[Route('/admin/instrument')]
class AdminInstrumentController extends AbstractController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/', name: 'app_admin_instrument_index', methods: ['GET'])]
    public function index(InstrumentRepository $instrumentRepository): Response
    {
        return $this->render('admin_instrument/index.html.twig', [
            'instruments' => $instrumentRepository->findAll(),
        ]);
    }
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/new', name: 'app_admin_instrument_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $instrument = new Instrument();
        $form = $this->createForm(InstrumentType::class, $instrument);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($instrument);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_instrument_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_instrument/new.html.twig', [
            'instrument' => $instrument,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}', name: 'app_admin_instrument_show', methods: ['GET'])]
    public function show(Instrument $instrument): Response
    {
        return $this->render('admin_instrument/show.html.twig', [
            'instrument' => $instrument,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}/edit', name: 'app_admin_instrument_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Instrument $instrument, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(InstrumentType::class, $instrument);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('pictureFile')->getData() === null) {
                $instrument->setPicture(null);
            }
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_instrument_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_instrument/edit.html.twig', [
            'instrument' => $instrument,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}', name: 'app_admin_instrument_delete', methods: ['POST'])]
    public function delete(Request $request, Instrument $instrument, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$instrument->getId(), $request->request->get('_token'))) {
            $entityManager->remove($instrument);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_instrument_index', [], Response::HTTP_SEE_OTHER);
    }
}
