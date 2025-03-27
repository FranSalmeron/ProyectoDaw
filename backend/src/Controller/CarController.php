<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\User;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
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
    public function index(CarRepository $carRepository, SerializerInterface $serializer, LoggerInterface $logger): Response
    {
        $cars = $carRepository->findAll();

        
        if (empty($cars)) {
            return new JsonResponse(['message' => 'No cars found'], Response::HTTP_NOT_FOUND);
        }

        // La URL base para las imágenes,
        $imageBaseUrl = '/uploads/images/';

        // Añadir la URL base de las imágenes
        foreach ($cars as $car) {
            if ($car->getImages()) {
                $imagesWithUrls = [];
                foreach ($car->getImages() as $image) {
                    $imagesWithUrls[] = $imageBaseUrl . $image; // Construimos la URL completa
                }
                $car->setImages($imagesWithUrls); // Reemplazamos los nombres de los archivos con las URLs completas
            }
        }

        // Serializamos el array de coches a JSON
        $jsonCars = $serializer->serialize($cars, 'json', ['groups' => 'car_list']);


        // Agregar un log para verificar los datos serializados
        $logger->info('Coches serializados: ' . $jsonCars);  // Aquí registramos los datos serializados en el log

        // Retornamos la respuesta JSON con los coches serializados
        return new JsonResponse(json_decode($jsonCars), Response::HTTP_OK);
    }

    #[Route('/car/user/{id}', name: 'app_car_index_by_user', methods: ['GET'])]
    public function indexByUser(CarRepository $carRepository, SerializerInterface $serializer, $id): Response
    {
        // Obtener todos los coches de un usuario por su ID
        $cars = $carRepository->findBy(['user' => $id]);

        
        if (empty($cars)) {
            return new JsonResponse(['message' => 'No cars found for this user'], Response::HTTP_NOT_FOUND);
        }

        // Serializar los coches a JSON
        $jsonCars = $serializer->serialize($cars, 'json', ['groups' => 'car_list']); // Usa un grupo de serialización si es necesario

        // Retornamos la respuesta JSON con los coches serializados
        return new JsonResponse($jsonCars, Response::HTTP_OK, [], true);
    }

    #[Route('/new', name: 'app_car_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Crear un nuevo objeto Car
        $car = new Car();

        // Obtener los datos del formulario, incluidas las imágenes
        $formData = $request->request->all();
        $images = $request->files->get('images');  // Obtenemos los archivos de la solicitud

        // Verificar si las imágenes han sido subidas
        $imagePaths = [];
        if ($images) {
            foreach ($images as $image) {
                // Asegúrate de que la imagen es válida
                $newFilename = uniqid() . '.' . $image->guessExtension(); // Obtén la extensión de la imagen

                try {
                    $image->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                    $imagePaths[] = $newFilename;
                } catch (FileException $e) {
                    return $this->json(['status' => 'error', 'message' => 'Error al cargar la imagen'], Response::HTTP_BAD_REQUEST);
                }
            }
        }

        // Crear un objeto DateTime con la fecha y hora actual
        $publicationDate = new \DateTime();  // Esto genera la fecha y hora actuales

        // Asignar la fecha de publicación al objeto Car
        $car->setPublicationDate($publicationDate);

        // Asignar los datos del coche (excepto las imágenes)
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
        $car->setCarSold($formData['carSold']);
        $car->setLat($formData['lat']);
        $car->setLon($formData['lon']);
        $car->setCity($formData['city']);

        // Asignar las imágenes
        $car->setImages($imagePaths);

        // Buscar el usuario por el ID enviado en el formData
        $user = $entityManager->getRepository(User::class)->find($formData['user']);
        if (!$user) {
            return $this->json(['status' => 'error', 'message' => 'Usuario no encontrado.'], Response::HTTP_BAD_REQUEST);
        }
        // Asignar el usuario al coche
        $car->setUser($user);

        // Persistir el coche en la base de datos
        $entityManager->persist($car);
        $entityManager->flush();

        return $this->json(['status' => 'ok', 'message' => 'Coche creado con éxito']);
    }

    #[Route('/{id}', name: 'app_car_show', methods: ['GET'])]
    public function showById(CarRepository $carRepository, SerializerInterface $serializer, $id): Response
    {
        // Buscar el coche por el ID recibido como parámetro
        $car = $carRepository->find($id);

        if (!$car) {
            return new JsonResponse(['message' => 'No car found'], Response::HTTP_NOT_FOUND);
        }        

        // La URL base para las imágenes,
        $imageBaseUrl = 'https://localhost:8001/uploads/images/';

        // Añadir la URL base de las imágenes
            if ($car->getImages()) {
                $imagesWithUrls = [];
                foreach ($car->getImages() as $image) {
                    $imagesWithUrls[] = $imageBaseUrl . $image; // Construimos la URL completa
                }
                $car->setImages($imagesWithUrls); // Reemplazamos los nombres de los archivos con las URLs completas
            }
        
        // Serializamos el array de coches a JSON
        $jsonCars = $serializer->serialize($car, 'json', ['groups' => 'car_list']);

        // Retornamos la respuesta JSON con los coches serializados
        return new JsonResponse(json_decode($jsonCars), Response::HTTP_OK);
    }

    #[Route('/{id}/edit', name: 'app_car_edit', methods: ['PATCH'])]
    public function edit(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        // Si no existe el coche, devolvemos un error 404
        if (!$car) {
            return new JsonResponse([
                'status' => 'error',
                'message' => 'Car not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);

        if (isset($data['brand'])) {
            $car->setBrand($data['brand']);
        }
        if (isset($data['model'])) {
            $car->setModel($data['model']);
        }
        if (isset($data['manufacture_year'])) {
            $car->setManufactureYear($data['manufacture_year']);
        }
        if (isset($data['mileage'])) {
            $car->setMileage($data['mileage']);
        }
        if (isset($data['price'])) {
            $car->setPrice($data['price']);
        }
        if (isset($data['color'])) {
            $car->setColor($data['color']);
        }
        if (isset($data['fuelType'])) {
            $car->setFuelType($data['fuelType']);
        }
        if (isset($data['transmission'])) {
            $car->setTransmission($data['transmission']);
        }
        if (isset($data['traction'])) {
            $car->setTraction($data['traction']);
        }
        if (isset($data['doors'])) {
            $car->setDoors($data['doors']);
        }
        if (isset($data['seats'])) {
            $car->setSeats($data['seats']);
        }
        if (isset($data['description'])) {
            $car->setDescription($data['description']);
        }
        if (isset($data['carCondition'])) {
            $car->setCarCondition($data['carCondition']);
        }
        if (isset($data['images'])) {
            $car->setImages($data['images']);
        }
        if (isset($data['CarSold'])) {
            $car->setCarSold($data['CarSold']);
        }
        if (isset($data['lat'])) {
            $car->setLat($data['lat']);
        }
        if (isset($data['lon'])) {
            $car->setLon($data['lon']);
        }
        if (isset($data['city'])) {
            $car->setCity($data['city']);
        }

        try {
            $entityManager->flush();

            return new JsonResponse([
                'status' => 'success',
                'message' => 'Car details updated successfully'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return new JsonResponse([
                'status' => 'error',
                'message' => 'Failed to update car details',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route('/{id}/delete', name: 'app_car_delete', methods: ['POST'])]
    public function delete(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {        
            try {
                // Eliminar el coche
                $entityManager->remove($car);
                $entityManager->flush();

                // Retornar éxito
                return new JsonResponse([
                    'status' => 'correcto',
                    'message' => 'Coche eliminado correctamente'
                ], Response::HTTP_OK);
            } catch (\Exception $e) {
                // En caso de error, retornar error
                return new JsonResponse([
                    'status' => 'no',
                    'message' => 'Error al eliminar el coche',
                    'error' => $e->getMessage()
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
    }
}
