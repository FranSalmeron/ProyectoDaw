<?php

namespace App\Service;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTDecodeFailureException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Symfony\Component\HttpFoundation\JsonResponse;

class JwtAuthService extends AbstractAuthenticator
{
    private $jwtEncoder;
    private $entityManager;

    // Constructor para inyectar el JWTEncoder y EntityManager
    public function __construct(JWTEncoderInterface $jwtEncoder, EntityManagerInterface $entityManager)
    {
        $this->jwtEncoder = $jwtEncoder;
        $this->entityManager = $entityManager;
    }

    /**
     * Obtener el usuario a partir del token JWT
     */
    public function getUserFromToken(string $token): User
    {
        try {
            $payload = $this->jwtEncoder->decode($token);
        } catch (JWTDecodeFailureException $e) {
            throw new \InvalidArgumentException(json_encode(['error' => 'Invalid token', 'message' => $e->getMessage()]));
        }

        // Usar EntityManager para acceder al repositorio de User
        $user = $this->entityManager
            ->getRepository(User::class)
            ->findOneBy(['name' => $payload['name']]);

        if (!$user) {
            throw new \InvalidArgumentException(json_encode(['error' => 'Invalid token']));
        }

        return $user;
    }

    /**
     * Verifica si la solicitud tiene un token en el encabezado Authorization
     */
    public function supports(Request $request): ?bool
    {
        $authorizationHeader = $request->headers->get('Authorization');
        return preg_match('/^Bearer\s+(.*)$/', $authorizationHeader) > 0;
    }

    /**
     * Autentica la solicitud usando el token JWT
     */
    public function authenticate(Request $request): SelfValidatingPassport
    {
        $authorizationHeader = $request->headers->get('Authorization');
        preg_match('/^Bearer\s+(.*)$/', $authorizationHeader, $matches);
        $token = $matches[1];

        try {
            // Obtener la clave pública desde un archivo o configuración
            $publicKey = file_get_contents($_SERVER['DOCUMENT_ROOT'] . './../config/jwt/public.pem');

            // Decodificar el token JWT usando la clave pública sin el "kid"
            $decoded = JWT::decode($token,  new Key($publicKey, 'RS256'));

            // Extraer el 'name' del token decodificado
            $username = $decoded->name;

            // Buscar el usuario en la base de datos utilizando el 'name' del token
            $user = $this->entityManager
                ->getRepository(User::class)
                ->findOneBy(['name' => $username]);

            if (!$user) {
                throw new AuthenticationException('User not found');
            }
        } catch (\Exception $e) {
            throw new AuthenticationException('Invalid token or error during verification');
        }

        return new SelfValidatingPassport(
            new UserBadge($user->getId()) 
        );
    }


    /**
     * Responde al fallo de autenticación.
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        return new JsonResponse(
            ['error' => 'Authentication failed', 'message' => $exception->getMessage()],
            403 
        );
    }

    /**
     * Responde al éxito de la autenticación.
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // Obtener el ID del usuario desde el Token
        $userId = $token->getUserIdentifier();

        // Retornar el éxito junto con el ID del usuario
        return new JsonResponse(
            [
                'success' => 'Authentication successful',
                'userId' => $userId  // Aquí devolvemos el userId junto con el mensaje de éxito
            ],
            200 
        );
    }
}
