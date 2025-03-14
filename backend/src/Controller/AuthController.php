<?php
// src/Controller/AuthController.php

namespace App\Controller;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AbstractController
{
    private $passwordHasher;
    private $jwtEncoder;
    private $entityManager;

    public function __construct(
        UserPasswordHasherInterface $passwordHasher,
        JWTEncoderInterface $jwtEncoder,
        EntityManagerInterface $entityManager
    ) {
        $this->passwordHasher = $passwordHasher;
        $this->jwtEncoder = $jwtEncoder;
        $this->entityManager = $entityManager;
    }

    #[Route('/api/verify-token', name: 'app_verify_token', methods: ['POST'])]
    public function verifyToken(Request $request): Response
    {
        $authorizationHeader = $request->headers->get('Authorization');

        // Verificar que el token está presente y en el formato adecuado
        if (!$authorizationHeader || preg_match('/^Bearer\s+(.*)$/', $authorizationHeader, $matches) !== 1) {
            return new JsonResponse(['error' => 'Token no proporcionado o formato incorrecto'], Response::HTTP_UNAUTHORIZED);
        }

        $token = $matches[1];  // Extraer el token de la cabecera

        try {
            $publicKey = file_get_contents($_SERVER['DOCUMENT_ROOT'] . './../config/jwt/public.pem');

            // Decodificar el token JWT usando la clave pública
            $decoded = JWT::decode($token, new Key($publicKey, 'RS256'));

            // Aquí asumimos que el 'userId' está dentro del payload del token
            $userId = $decoded->userId;  // Si el campo es 'userId' en tu token

            // Responder con el userId en formato JSON
            return new JsonResponse(['userId' => $userId], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Captura del error y respuesta en JSON
            return new JsonResponse(['error' => 'Token inválido: ' . $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        }
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

        $user = $this->entityManager->getRepository(User::class)->findOneBy(['name' => $name]);

        if (!$user) {
            return new JsonResponse(['error' => 'Invalid name or password'], Response::HTTP_UNAUTHORIZED);
        }

        if (!$this->passwordHasher->isPasswordValid($user, $password)) {
            return new JsonResponse(['error' => 'Invalid name or password'], Response::HTTP_UNAUTHORIZED);
        }

        try {
            $privateKey = file_get_contents($_SERVER['DOCUMENT_ROOT'] . './../config/jwt/private.pem');
            $payload = [
                'name' => $user->getName(),
                'roles' => $user->getRoles(),
                'userId' => $user->getId(), 
                'exp' => time() + 7200, // 2 hora de expiración
            ];

            $token = JWT::encode($payload, $privateKey, 'RS256');
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Error generating token', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // Retornar el token al frontend en formato JSON
        return new JsonResponse(['token' => $token], Response::HTTP_OK);
    }
}
