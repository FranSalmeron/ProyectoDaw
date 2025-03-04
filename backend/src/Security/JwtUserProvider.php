<?php
// src/Security/JwtUserProvider.php
namespace App\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;



class JwtUserProvider implements UserProviderInterface
{
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Cargar un usuario a partir del userId del JWT
     */
    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        // El $identifier aquí sería el userId que viene del JWT
        $user = $this->entityManager->getRepository(User::class)->find($identifier);

        if (!$user) {
            throw new \Exception("User not found.");
        }

        return $user;
    }

    /**
     * Obtener el usuario por el username (se puede dejar vacío si no es necesario)
     */
    public function refreshUser(UserInterface $user)
    {
        return $user;  // En este caso no necesitamos refrescar al usuario
    }

    public function supportsClass(string $class): bool
    {
        return User::class === $class;
    }
}
