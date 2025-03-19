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
use Psr\Log\LoggerInterface; // Importa la interfaz del logger

class AuthController extends AbstractController
{
    private $passwordHasher;
    private $jwtManager;
    private $entityManager;
    private $logger;  // Declara el logger

    public function __construct(
        UserPasswordHasherInterface $passwordHasher,
        JWTTokenManagerInterface $jwtManager,
        EntityManagerInterface $entityManager,
        LoggerInterface $logger  // Inyecta el logger
    ) {
        $this->passwordHasher = $passwordHasher;
        $this->jwtManager = $jwtManager;
        $this->entityManager = $entityManager;
        $this->logger = $logger;  // Asigna el logger a la propiedad
    }

    #[Route('/api/login', name: 'app_login', methods: ['POST'])]
    public function login(Request $request): Response
    {
        $content = $request->getContent();
        $data = json_decode($content, true);

        // Verificar que los datos de nombre y contraseña existen
        if (!isset($data['name']) || !isset($data['password'])) {
            $this->logger->warning('Login attempt missing name or password', ['data' => $data]);
            return new JsonResponse(['error' => 'Missing name or password'], Response::HTTP_BAD_REQUEST);
        }

        $name = $data['name'];
        $password = $data['password'];

        // Verificar si el nombre está vacío
        if (empty($name)) {
            $this->logger->warning('Login attempt with empty name', ['name' => $name]);
            return new JsonResponse(['error' => 'Name cannot be empty'], Response::HTTP_BAD_REQUEST);
        }

        // Buscar el usuario en la base de datos
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['name' => $name]);

        // Log para ver si el usuario fue encontrado
        if (!$user) {
            $this->logger->warning('User not found during login', ['name' => $name]);
            return new JsonResponse(['error' => 'Invalid name or password'], Response::HTTP_UNAUTHORIZED);
        } else {
            $this->logger->info('User found for login', ['userId' => $user->getId(), 'name' => $name]);
        }

        // Verificar la validez de la contraseña
        if (!$this->passwordHasher->isPasswordValid($user, $password)) {
            $this->logger->warning('Invalid password during login attempt', ['userId' => $user->getId()]);
            return new JsonResponse(['error' => 'Invalid name or password'], Response::HTTP_UNAUTHORIZED);
        }

        // Crear el payload para el JWT
        $payload = [
            'userId' => $user->getId(),
            'roles' => $user->getRoles(),
            'exp' => time() + 3600  // Token de acceso por 1 hora
        ];

        $token = $this->jwtManager->create($user, $payload);

        // Crear el refresh token aleatorio
        $refreshToken = bin2hex(random_bytes(64));  // Generar un refresh token aleatorio
        $user->setRefreshToken($refreshToken);  // Guardarlo en la base de datos
        $this->entityManager->flush();

        // Log para el refresh token
        $this->logger->info('Refresh token generated for user', ['userId' => $user->getId(), 'refreshToken' => $refreshToken]);

        return new JsonResponse([
            'token' => $token,
            'refreshToken' => $refreshToken
        ], Response::HTTP_OK);
    }

    #[Route('/api/refreshToken', name: 'app_refresh_token', methods: ['POST'])]
    public function refreshToken(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $refreshToken = $data['refreshToken'] ?? null;

        // Verificar que el refresh token fue proporcionado
        if (!$refreshToken) {
            $this->logger->warning('Refresh token not provided', ['data' => $data]);
            return new JsonResponse(['error' => 'No refresh token provided'], Response::HTTP_BAD_REQUEST);
        }

        // Buscar el usuario por el refresh token
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['refreshToken' => $refreshToken]);

        // Log para verificar si el usuario fue encontrado
        if (!$user) {
            $this->logger->warning('Invalid refresh token', ['refreshToken' => $refreshToken]);
            return new JsonResponse(['error' => 'Invalid refresh token'], Response::HTTP_UNAUTHORIZED);
        } else {
            $this->logger->info('User found for refresh token', ['userId' => $user->getId(), 'refreshToken' => $refreshToken]);
        }

        // Generar un nuevo token JWT si el refresh token es válido
        $payload = [
            'userId' => $user->getId(),
            'roles' => $user->getRoles(),
            'exp' => time() + 3600  // Nuevo token de acceso con 1 hora de expiración
        ];

        $token = $this->jwtManager->create($user, $payload);

        // Log para cuando se genera el nuevo token
        $this->logger->info('New JWT generated for refresh token', ['userId' => $user->getId()]);

        return new JsonResponse(['token' => $token], Response::HTTP_OK);
    }
}
