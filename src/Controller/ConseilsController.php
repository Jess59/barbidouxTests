<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConseilsController extends AbstractController
{
    #[Route('/conseils', name: 'app_conseils')]
    public function index(): Response
    {
        return $this->render('conseils/conseils.html.twig', [
            'controller_name' => 'ConseilsController',
        ]);
    }
}
