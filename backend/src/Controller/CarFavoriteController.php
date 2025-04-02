<?php

namespace App\Controller;

use App\Entity\CarFavorite;
use App\Form\CarFavoriteType;
use App\Repository\CarFavoriteRepository;
use App\Repository\CarRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/favorite')]
class CarFavoriteController extends AbstractController
{
    #[Route('/', name: 'app_car_favorite_index', methods: ['GET'])]
    public function index(CarFavoriteRepository $carFavoriteRepository): Response
    {
        // Devuelve todos los favoritos en formato JSON
        $carFavorites = $carFavoriteRepository->findAll();

        return $this->json([
            'status' => 'ok',
            'data' => $carFavorites
        ]);
    }

    #[Route('/{userId}/favorites', name: 'app_car_favorite_user_favorites', methods: ['GET'])]
    public function getUserFavorites(int $userId, CarFavoriteRepository $carFavoriteRepository): Response
    {
        // Buscar los favoritos por userId
        $favorites = $carFavoriteRepository->findBy(['user' => $userId]);

        if (empty($favorites)) {
            return $this->json([
                'status' => 'error',
                'message' => 'No favorites found for this user.'
            ], Response::HTTP_NOT_FOUND);
        }

        return $this->json([
            'status' => 'ok',
            'data' => $favorites
        ]);
    }

    #[Route('/new', name: 'app_car_favorite_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository, CarRepository $carRepository): Response
    {
        // Creamos el nuevo favorito a partir de los datos del request
        $data = json_decode($request->getContent(), true);

        if (!$data) {
            return $this->json([
                'status' => 'error',
                'message' => 'No data provided'
            ], Response::HTTP_BAD_REQUEST);
        }
        $carFavorite = new CarFavorite();

        if (isset($data['user_id'])) {
            // Aquí puedes buscar al usuario por su id, si es necesario
            // Por ejemplo, si tienes una entidad User relacionada:
            $user = $userRepository->find($data['user_id']);
            if ($user) {
                $carFavorite->setUser($user);
            } else {
                return $this->json([
                    'status' => 'error',
                    'message' => 'User not found'
                ], Response::HTTP_NOT_FOUND);
            }
        }

        if (isset($data['car_id'])) {
            // Si es necesario, puedes buscar el coche por su id, de forma similar al usuario
            $car = $carRepository->find($data['car_id']);
            if ($car) {
                $carFavorite->setCar($car);
            } else {
                return $this->json([
                    'status' => 'error',
                    'message' => 'Car not found'
                ], Response::HTTP_NOT_FOUND);
            }
        } else {
            return $this->json([
                'status' => 'error',
                'message' => 'Required fields missing: car_id'
            ], Response::HTTP_BAD_REQUEST);
        }

        $entityManager->persist($carFavorite);
        $entityManager->flush();

        return $this->json([
            'status' => 'ok',
            'message' => 'Car favorite created successfully',
        ], Response::HTTP_CREATED);
    }

    #[Route('/{id}', name: 'app_car_favorite_show', methods: ['GET'])]
    public function show(CarFavorite $carFavorite): Response
    {
        // Devuelve los detalles de un favorito específico
        if (!$carFavorite) {
            return $this->json([
                'status' => 'error',
                'message' => 'Car favorite not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return $this->json([
            'status' => 'ok',
            'data' => $carFavorite
        ]);
    }

    #[Route('/{id}/edit', name: 'app_car_favorite_edit', methods: ['PUT'])]
    public function edit(Request $request, CarFavorite $carFavorite, EntityManagerInterface $entityManager): Response
    {
        // Editamos un favorito existente
        $data = json_decode($request->getContent(), true);

        if (!$data) {
            return $this->json([
                'status' => 'error',
                'message' => 'No data provided'
            ], Response::HTTP_BAD_REQUEST);
        }

        // Aquí puedes validar y asignar los datos recibidos a $carFavorite
        // Ejemplo:
        // $carFavorite->setUser($data['user_id']);
        // $carFavorite->setCar($data['car_id']);

        $entityManager->flush();

        return $this->json([
            'status' => 'ok',
            'message' => 'Car favorite updated successfully',
            'data' => $carFavorite
        ]);
    }

    #[Route('/favorite/{userId}/{carId}', name: 'app_car_favorite_delete', methods: ['DELETE'])]
    public function delete(int $userId, int $carId, CarFavoriteRepository $carFavoriteRepository, EntityManagerInterface $entityManager): Response
    {
        // Buscar el favorito con los IDs proporcionados
        $carFavorite = $carFavoriteRepository->findOneBy([
            'user' => $userId,
            'car' => $carId,
        ]);

        if (!$carFavorite) {
            return $this->json([
                'status' => 'error',
                'message' => 'Car favorite not found'
            ], Response::HTTP_NOT_FOUND);
        }

        // Eliminar el favorito
        $entityManager->remove($carFavorite);
        $entityManager->flush();

        return $this->json([
            'status' => 'ok',
            'message' => 'Car favorite deleted successfully'
        ], Response::HTTP_OK);
    }
}
