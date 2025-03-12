<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

class MainController extends AbstractController
{
    private Connection $connection;
    
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
    #[Route('/', name: 'app_main')]
    public function main(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/csrf-token', name: 'app_csrf_token', methods: ['GET'])]
    public function csrfToken(CsrfTokenManagerInterface $csrfTokenManager): JsonResponse
    {
        $csrfToken = $csrfTokenManager->getToken('your_token_id')->getValue();
        return new JsonResponse(['csrfToken' => $csrfToken]);
    }
}
