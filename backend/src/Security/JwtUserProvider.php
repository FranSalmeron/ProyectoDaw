<?php
// src/Security/JwtUserProvider.php
namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface; 
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class JwtUserProvider implements UserProviderInterface
{
    private EntityManagerInterface $entityManager; 

 
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Cargar un usuario a partir del userId del JWT
     */
    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        $user = $this->entityManager->getRepository(User::class)->find($identifier);

        if (!$user) {
            throw new \Exception("User not found.");
        }

        return $user;
    }

    /**
     * Obtener el usuario por el username 
     */
    public function refreshUser(UserInterface $user)
    {
        return $user;  
    }

    public function supportsClass(string $class): bool
    {
        return User::class === $class;
    }
}
