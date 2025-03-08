<?php

namespace App\Controller;

use App\Entity\Todo;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiController extends AbstractController
{
    #[Route('/todos', name: 'app_api')]
    public function index(EntityManagerInterface $em): Response
    {
        $todos = $em->getRepository(Todo::class)->findAll();

        return $this->render('api/index.html.twig', [
            'todos' => $todos,
        ]);
    }

    #[Route('/api/todos', name: 'api_todos')]
    public function getTodos(EntityManagerInterface $em): Response
    {
        $todos = $em->getRepository(Todo::class)->findAll();

        return $this->json($todos, 200, [], ['groups' => 'todo:read']);
    }
}
