<?php

namespace App\Controller;

use App\Entity\Hike;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HikeController extends AbstractController
{
    #[Route('/hike', name: 'app_hike')]
    public function index(EntityManagerInterface $entityManager): Response
    {
                // Récupérer le gestionnaire d'entités
                $entityManager = $this->getDoctrine()->getManager();

                // Récupérer toutes les randonnées depuis la base de données et les insérer dans le tableau $hikes
                $hikes = $entityManager->getRepository(Hike::class)->findAll();
                return $this->render('hike/hike.html.twig', [
                // récupère toute les données de la table hikes et les insèrent dans le tableau $hikes afin de les exploiter dans le twig
                'hikes' => $hikes,
        ]);
    }
}
