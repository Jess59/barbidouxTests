<?php

namespace App\Controller;

use App\Entity\Post; 
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
        $jsonRecu = $request->getContent();
        try {
            $post = $serializer->deserialize($jsonRecu, Post::class, 'json');
            $post->setCreatedAt(new \DateTime());
            $errors = $validator->validate($post);
            if (count($errors) > 0) {
                return $this->json($errors, 400);
            }
            $em->persist($post);
            $em->flush();
            return $this->json($post, 201, [], ['groups' => 'post:read']);
        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }
    }

}

