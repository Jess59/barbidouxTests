<?php
namespace App\Controller;
use App\Repository\HikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
class ApiPostController extends AbstractController
{
    #[Route('/api/post', name: 'app_api_post', methods: ['GET'])]
    public function index(HikeRepository $hikeRepository)
    {
        return $this->Json($hikeRepository -> findAll(),200, [], ['groups' => 'hike:read']);
    }
    /*#[Route('/api/post', name: 'app_api_create', methods: ['POST'])]
    public function create(Request $request)
    {
        return $this->Json($hikeRepository -> findAll(),200, [], ['groups' => 'hike:read']);
    }*/
}