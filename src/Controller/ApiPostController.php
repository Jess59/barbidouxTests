<?php

namespace App\Controller;

use App\Entity\Hike; 
use App\Repository\HikeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiPostController extends AbstractController
{
    #[Route('/api/post', name: 'app_api_post', methods: ['GET'])]
    public function index(HikeRepository $hikeRepository)
    {
        return $this->Json($hikeRepository -> findAll(),200, [], ['groups' => 'hike:read']);
    }

    #[Route('/api/post', name: 'app_api_store', methods: ['POST'])]
    public function store(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator)
    {
        $jsonRecu = $request->getContent(); /**ligne à pb */
        try {
            $hike = $serializer->deserialize($jsonRecu, Hike::class, 'json');
            $errors = $validator->validate($hike);
            if (count($errors) > 0) {
                return $this->json($errors, 400);
            }
            $em->persist($hike);
            $em->flush();
            return $this->json($hike, 201, [], ['groups' => 'hike:read']);
        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
