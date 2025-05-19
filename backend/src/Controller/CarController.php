<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\User;
use App\Repository\CarRepository;
use App\Service\CloudinaryService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;

#[Route('/car')]
class CarController extends AbstractController
{
    #[Route('/', name: 'app_car_index', methods: ['GET'])]
    public function index(Request $request, CarRepository $carRepository, SerializerInterface $serializer): Response
    {
        $page = max(1, (int) $request->query->get('page', 1)); // valor por defecto: 1
        $limit = min(50, (int) $request->query->get('limit', 10)); // máximo 50 por seguridad
        $offset = ($page - 1) * $limit;

        $cars = $carRepository->findBy([], null, $limit, $offset);
        $totalCars = $carRepository->count([]);

        if (empty($cars)) {
            return new JsonResponse(['message' => 'No cars found'], Response::HTTP_NOT_FOUND);
        }

        $jsonCars = $serializer->serialize($cars, 'json', ['groups' => 'car_list']);

        return new JsonResponse([
            'data' => json_decode($jsonCars),
            'pagination' => [
                'total' => $totalCars,
                'page' => $page,
                'limit' => $limit,
                'totalPages' => ceil($totalCars / $limit),
            ],
        ], Response::HTTP_OK);
    }

    #[Route('/car/user/{id}', name: 'app_car_index_by_user', methods: ['GET'])]
    public function indexByUser(CarRepository $carRepository, SerializerInterface $serializer, $id): Response
    {
        $cars = $carRepository->findBy(['user' => $id]);

        if (empty($cars)) {
            return new JsonResponse(['message' => 'No cars found for this user'], Response::HTTP_NOT_FOUND);
        }

        $jsonCars = $serializer->serialize($cars, 'json', ['groups' => 'car_list']);
        return new JsonResponse($jsonCars, Response::HTTP_OK, [], true);
    }

    #[Route('/new', name: 'app_car_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, CloudinaryService $cloudinaryService): Response
    {
        $car = new Car();
        $formData = $request->request->all();
        $images = $request->files->get('images');

        $imageUrls = [];
        if ($images) {
            foreach ($images as $image) {
                if ($image && $image->isValid()) {
                    try {
                        $url = $cloudinaryService->uploadImage($image->getPathname());
                        $imageUrls[] = $url;
                    } catch (\Exception $e) {
                        return $this->json([
                            'status' => 'error',
                            'message' => 'Error al subir la imagen: ' . $e->getMessage()
                        ], Response::HTTP_BAD_REQUEST);
                    }
                }
            }
        }

        $car->setPublicationDate(new \DateTime());

        $car->setBrand($formData['brand']);
        $car->setModel($formData['model']);
        $car->setManufactureYear($formData['manufacture_year']);
        $car->setMileage($formData['mileage']);
        $car->setPrice($formData['price']);
        $car->setColor($formData['color']);
        $car->setFuelType($formData['fuelType']);
        $car->setTransmission($formData['transmission']);
        $car->setTraction($formData['traction']);
        $car->setDoors($formData['doors']);
        $car->setSeats($formData['seats']);
        $car->setDescription($formData['description']);
        $car->setCarCondition($formData['carCondition']);
        $car->setCarSold('subido');
        $car->setLat($formData['lat']);
        $car->setLon($formData['lon']);
        $car->setCity($formData['city']);
        $car->setImages($imageUrls);

        $user = $entityManager->getRepository(User::class)->find($formData['user']);
        if (!$user) {
            return $this->json(['status' => 'error', 'message' => 'Usuario no encontrado.'], Response::HTTP_BAD_REQUEST);
        }

        $car->setUser($user);
        $entityManager->persist($car);
        $entityManager->flush();

        return $this->json(['status' => 'ok', 'message' => 'Coche creado con éxito']);
    }

    #[Route('/{id}', name: 'app_car_show', methods: ['GET'])]
    public function showById(CarRepository $carRepository, SerializerInterface $serializer, $id): Response
    {
        $car = $carRepository->find($id);

        if (!$car) {
            return new JsonResponse(['message' => 'No car found'], Response::HTTP_NOT_FOUND);
        }

        $jsonCar = $serializer->serialize($car, 'json', ['groups' => 'car_list']);
        return new JsonResponse(json_decode($jsonCar), Response::HTTP_OK);
    }

    #[Route('/{id}/edit', name: 'app_car_edit', methods: ['PATCH'])]
    public function edit(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['brand'])) $car->setBrand($data['brand']);
        if (isset($data['model'])) $car->setModel($data['model']);
        if (isset($data['manufacture_year'])) $car->setManufactureYear($data['manufacture_year']);
        if (isset($data['mileage'])) $car->setMileage($data['mileage']);
        if (isset($data['price'])) $car->setPrice($data['price']);
        if (isset($data['color'])) $car->setColor($data['color']);
        if (isset($data['fuelType'])) $car->setFuelType($data['fuelType']);
        if (isset($data['transmission'])) $car->setTransmission($data['transmission']);
        if (isset($data['traction'])) $car->setTraction($data['traction']);
        if (isset($data['doors'])) $car->setDoors($data['doors']);
        if (isset($data['seats'])) $car->setSeats($data['seats']);
        if (isset($data['description'])) $car->setDescription($data['description']);
        if (isset($data['carCondition'])) $car->setCarCondition($data['carCondition']);
        if (isset($data['images'])) $car->setImages($data['images']);
        if (isset($data['carSold'])) $car->setCarSold($data['carSold']);
        if (isset($data['lat'])) $car->setLat($data['lat']);
        if (isset($data['lon'])) $car->setLon($data['lon']);
        if (isset($data['city'])) $car->setCity($data['city']);

        try {
            $entityManager->flush();
            return new JsonResponse(['status' => 'success', 'message' => 'Car updated successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return new JsonResponse([
                'status' => 'error',
                'message' => 'Failed to update car details',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route('/{id}/delete', name: 'app_car_delete', methods: ['DELETE'])]
    public function delete(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        try {
            $entityManager->remove($car);
            $entityManager->flush();

            return new JsonResponse([
                'status' => 'correcto',
                'message' => 'Coche eliminado correctamente'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return new JsonResponse([
                'status' => 'no',
                'message' => 'Error al eliminar el coche',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
