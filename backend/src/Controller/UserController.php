<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/index', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
    
        $users = $userRepository->findAll();
    
        $data = array_map(function ($user) {
            $roles = $user->getRoles();
            return [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'address' => $user->getAddress(),
                'phone' => $user->getPhone(),
                'roles' => $roles,
                'isAdmin' => in_array('ROLE_ADMIN', $roles),
                'isBanned' => in_array('ROLE_BANNED', $roles),
            ];
        }, $users);
    
        return $this->json([
            'status' => 'ok',
            'users' => $data,
        ]);
    }    

    #[Route('/new', name: 'app_user_new', methods: ['POST','GET'])]
    public function new(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);

        if (!$data) {
            return $this->json(['error' => 'Invalid data'], Response::HTTP_BAD_REQUEST);
        }

        $refreshToken = bin2hex(random_bytes(64)); // Genera un token aleatorio de 64 bytes

        $user = new User();
        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setAddress($data['address']);
        $user->setPhone($data['phone']);
        $user->setRoles($data['roles']);
        $user->setPassword($data['password']);
        $user->setRefreshToken($refreshToken); // Asigna el refresh token al usuario

        // Hashear la contraseña
        $hashedPassword = $passwordHasher->hashPassword($user, $user->getPassword());
        $user->setPassword($hashedPassword);

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json([
            'status' => 'ok',
            'message' => 'User registered successfully'
        ], Response::HTTP_CREATED);
    }

    #[Route('/prueba', name: 'app_user_index', methods: ['GET'])]
    public function prueba(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('user/new.html.twig');
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->json([
            'status' => 'ok',
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);

        if (!$data) {
            return $this->json(['error' => 'Invalid data'], Response::HTTP_BAD_REQUEST);
        }

        if (isset($data['name'])) {
            $user->setName($data['name']);
        }
        if (isset($data['email'])) {
            $user->setEmail($data['email']);
        }
        if (isset($data['address'])) {
            $user->setAddress($data['address']);
        }
        if (isset($data['phone'])) {
            $user->setPhone($data['phone']);
        }
        if (isset($data['roles'])) {
            $user->setRoles($data['roles']);
        }

        $entityManager->flush();

        return $this->json([
            'status' => 'ok',
            'message' => 'User updated successfully'
        ]);
    }

    #[Route('/{id}/delete', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->json([
            'status' => 'ok',
            'message' => 'User deleted successfully'
        ]);
    }

    // Método para asignar o quitar el rol de admin
    #[Route('/{id}/toggle-admin', name: 'app_user_toggle_admin', methods: ['POST'])]
    public function toggleAdmin(User $user, EntityManagerInterface $entityManager): Response
    {
        $roles = $user->getRoles();

        // Si el usuario ya tiene el rol de admin, lo eliminamos, si no lo tiene lo añadimos
        if (in_array('ROLE_ADMIN', $roles)) {
            $roles = array_diff($roles, ['ROLE_ADMIN']);
        } else {
            $roles[] = 'ROLE_ADMIN';
        }

        $user->setRoles($roles);
        $entityManager->flush();

        return $this->json([
            'status' => 'ok',
            'message' => 'User admin status updated successfully'
        ]);
    }

    // Método para añadir o quitar el rol de baneado
    #[Route('/{id}/toggle-banned', name: 'app_user_toggle_banned', methods: ['POST'])]
    public function toggleBanned(User $user, EntityManagerInterface $entityManager): Response
    {
        $roles = $user->getRoles();

        // Si el usuario ya está baneado, eliminamos el rol de baneado
        if (in_array('ROLE_BANNED', $roles)) {
            $roles = array_diff($roles, ['ROLE_BANNED']);
        } else {
            $roles[] = 'ROLE_BANNED';
        }

        $user->setRoles($roles);
        $entityManager->flush();

        return $this->json([
            'status' => 'ok',
            'message' => 'User banned status updated successfully'
        ]);
    }

    #[Route('/{id}/info', name: 'app_user_info', methods: ['GET', 'POST'])]
    public function getUserInfo($id, UserRepository $userRepository): Response
    {
        // Buscar el usuario por su ID
        $user = $userRepository->find($id);

        // Verificar si el usuario existe
        if (!$user) {
            return $this->json(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->json([
            'status' => 'ok',
            'id' => $user->getId(),
            'name' => $user->getName(),
            'address' => $user->getAddress(),
            'email' => $user->getEmail(),
            'phone' => $user->getPhone(),
            'roles' => $user->getRoles(),
        ]);
    }

    #[Route('/{id}/change-password', name: 'user_change_password', methods: ['POST'])]
    public function changePassword(
        Request $request,
        User $user,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ): Response {
        // Obtener los datos del cuerpo de la solicitud
        $data = json_decode($request->getContent(), true);

        if (!$data || !isset($data['currentPassword']) || !isset($data['newPassword'])) {
            return $this->json(['error' => 'Invalid data'], Response::HTTP_BAD_REQUEST);
        }

        // Verificar que la contraseña actual sea válida
        if (!$passwordHasher->isPasswordValid($user, $data['currentPassword'])) {
            return $this->json(['error' => 'Current password is incorrect'], Response::HTTP_BAD_REQUEST);
        }

        // Hashear la nueva contraseña
        $hashedNewPassword = $passwordHasher->hashPassword($user, $data['newPassword']);
        $user->setPassword($hashedNewPassword);

        // Guardar los cambios en la base de datos
        $entityManager->flush();

        return $this->json([
            'status' => 'ok',
            'message' => 'Password changed successfully'
        ]);
    }
}
