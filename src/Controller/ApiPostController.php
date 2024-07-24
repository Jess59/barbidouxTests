<?php

namespace App\Controller;
use App\Repository\HikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiPostController extends AbstractController
{
    #[Route('/api/post', name: 'app_api_post', methods: ['GET'])]
    public function index(HikeRepository $hikeRepository): Response
    {
        $hikes = $hikeRepository->findAll();
        dd($hikes);
        return $this->render('api_post/index.html.twig', [
            'controller_name' => 'ApiPostController',
        ]);
    }
}
