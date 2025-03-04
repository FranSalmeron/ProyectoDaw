<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    #[Route('/api/db', name: 'get_db')]
    public function index(): JsonResponse
    {
        try {
            $sql = 'SELECT * FROM user';
            $result = $this->connection->fetchOne($sql);
            
            if (!$result) {
                return $this->json([
                    'message' => 'No se encontraron registros en la tabla user'
                ]);
            }
            
            return $this->json([
                'message' => 'Usuarios: ' . $result
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Database error: ' . $e->getMessage()
            ], 500);
        }
    }
}
