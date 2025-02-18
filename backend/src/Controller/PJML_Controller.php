<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PJML_Controller extends AbstractController
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('base.html.twig'); // O cualquier vista que desees mostrar
    }

    #[Route('/api/db', name: 'get_db')]
    public function index(): JsonResponse
    {
        try {
            $sql = 'SELECT frasePJML FROM secretosPJML LIMIT 1';
            $result = $this->connection->fetchOne($sql);

            if (!$result) {
                return $this->json([
                    'message' => 'No frasePJML found in the database!'
                ]);
            }

            return $this->json([
                'message' => 'Backend Operativo, respuesta de la BD: ' . $result
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Database error: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/db', name: 'db_index')]
    public function dbIndex(): Response
    {
        return $this->render('db/index.html.twig', [
            'controller_name' => 'PJML_Controller'
        ]);
    }
}
