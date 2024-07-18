<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotreHistoireController extends AbstractController
{
    #[Route('/notre/histoire', name: 'app_notre_histoire')]
    public function index(): Response
    {
        return $this->render('notre_histoire/notreHistoire.html.twig', [
            'controller_name' => 'NotreHistoireController',
        ]);
    }
}
