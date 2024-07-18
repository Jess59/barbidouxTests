<?php

namespace App\Controller;

use App\Entity\Hike;
use App\Form\HikeType;
use App\Repository\HikeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'app_admin_index', methods: ['GET'])]
    public function index(HikeRepository $hikeRepository): Response
    {
        return $this->render('admin/admin.html.twig', [
            'hikes' => $hikeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $hike = new Hike();
        $form = $this->createForm(HikeType::class, $hike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($hike);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/new.html.twig', [
            'hike' => $hike,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_show', methods: ['GET'])]
    public function show(Hike $hike): Response
    {
        return $this->render('admin/show.html.twig', [
            'hike' => $hike,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Hike $hike, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HikeType::class, $hike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/edit.html.twig', [
            'hike' => $hike,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_delete', methods: ['POST'])]
    public function delete(Request $request, Hike $hike, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hike->getId(), $request->request->get('_token'))) {
            $entityManager->remove($hike);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
