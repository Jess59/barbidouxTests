<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
    #[Route('/mLegales', name: 'app_mLegales')]
    public function mLegales(): Response
    {
        return $this->render('mLegales/mLegales.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
