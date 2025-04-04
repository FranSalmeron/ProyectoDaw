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
        // Usamos el nuevo método con QueryBuilder para obtener los favoritos con los coches
        $favorites = $carFavoriteRepository->findByUserIdWithCar($userId);

        if (empty($favorites)) {
            return $this->json([
                'status' => 'error',
                'message' => 'No favorites found for this user.'
            ], Response::HTTP_NOT_FOUND);
        }

        // Serializamos los favoritos, incluyendo la información del coche asociado
        return $this->json([
            'status' => 'ok',
            'data' => $favorites,
        ], 200, [], ['groups' => 'car_favorite_list']);
    }

    #[Route('/new', name: 'app_car_favorite_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository, CarRepository $carRepository, CarFavoriteRepository $carFavoriteRepository): Response
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

        // Validamos si existe un 'user_id' en los datos
        if (isset($data['user_id'])) {
            // Buscamos al usuario por su ID
            $user = $userRepository->find($data['user_id']);
            if ($user) {
                $carFavorite->setUser($user);
            } else {
                return $this->json([
                    'status' => 'error',
                    'message' => 'User not found'
                ], Response::HTTP_NOT_FOUND);
            }
        } else {
            return $this->json([
                'status' => 'error',
                'message' => 'User ID is required'
            ], Response::HTTP_BAD_REQUEST);
        }

        // Validamos si existe un 'car_id' en los datos
        if (isset($data['car_id'])) {
            // Buscamos el coche por su ID
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
                'message' => 'Car ID is required'
            ], Response::HTTP_BAD_REQUEST);
        }

        // Verificamos si el favorito ya existe
        $existingFavorite = $carFavoriteRepository->findOneBy([
            'user' => $carFavorite->getUser(),
            'car' => $carFavorite->getCar(),
        ]);

        if ($existingFavorite) {
            return $this->json([
                'status' => 'error',
                'message' => 'This car is already in the favorites list for this user'
            ], Response::HTTP_CONFLICT); // 409 Conflict
        }

        // Persistimos el nuevo favorito en la base de datos
        try {
            $entityManager->persist($carFavorite);
            $entityManager->flush();
        } catch (\Exception $e) {
            return $this->json([
                'status' => 'error',
                'message' => 'Failed to save favorite',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // Creamos la respuesta con el favorito recién añadido
        $carFavorites = []; // Lista de favoritos

        $carFavorites[] = [
            'id' => $carFavorite->getId(),
            'user' => [
                'id' => $carFavorite->getUser()->getId(),
            ],
            'car' => [
                'id' => $carFavorite->getCar()->getId(),
            ],
        ];

        // Respondiendo con el favorito recién añadido
        return $this->json([
            'status' => 'ok',
            'data' => $carFavorites,
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

    #[Route('/{favoriteId}/delete', name: 'app_car_favorite_delete', methods: ['DELETE'])]
    public function delete(int $favoriteId, CarFavoriteRepository $carFavoriteRepository, EntityManagerInterface $entityManager): Response
    {
        // Buscar el favorito por su ID
        $carFavorite = $carFavoriteRepository->find($favoriteId);

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
