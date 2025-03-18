<?php

namespace App\Controller;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class AuthController extends AbstractController
{
    private $passwordHasher;
    private $jwtManager;
    private $entityManager;


    public function __construct(
        UserPasswordHasherInterface $passwordHasher,
        JWTTokenManagerInterface $jwtManager,
        EntityManagerInterface $entityManager
    ) {
        $this->passwordHasher = $passwordHasher;
        $this->jwtManager = $jwtManager;
        $this->entityManager = $entityManager;
    }

    #[Route('/api/login', name: 'app_login', methods: ['POST'])]
    public function login(Request $request): Response
    {
        $content = $request->getContent();
        $data = json_decode($content, true);

        // Verificar si 'name' y 'password' están presentes en los datos
        if (!isset($data['name']) || !isset($data['password'])) {
            return new JsonResponse(['error' => 'Missing name or password'], Response::HTTP_BAD_REQUEST);
        }

        // Obtener los valores de 'name' y 'password' de los datos
        $name = $data['name'];
        $password = $data['password'];

        // Verificar si el nombre está vacío
        if (empty($name)) {
            return new JsonResponse(['error' => 'Name cannot be empty'], Response::HTTP_BAD_REQUEST);
        }

        // Buscar al usuario en la base de datos usando el EntityManager
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['name' => $name]);

        if (!$user) {
            return new JsonResponse(['error' => 'Invalid name or password'], Response::HTTP_UNAUTHORIZED);
        }

        // Verificar si la contraseña es válida
        if (!$this->passwordHasher->isPasswordValid($user, $password)) {
            return new JsonResponse(['error' => 'Invalid name or password'], Response::HTTP_UNAUTHORIZED);
        }

        // Crear un payload personalizado
        $payload = [
            'userId' => $user->getId(),
            'roles' => $user->getRoles(),  
            'exp' => time() + 7200 
        ];

        // Generar el token JWT usando el payload personalizado
        $token = $this->jwtManager->create($user, $payload);  // Utiliza el método de crear el token con el payload
        
        // Retornar el token al frontend en formato JSON
        return new JsonResponse(['token' => $token], Response::HTTP_OK);
    }
}
