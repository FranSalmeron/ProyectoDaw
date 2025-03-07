<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\User;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/car')]
class CarController extends AbstractController
{
    #[Route('/', name: 'app_car_index', methods: ['GET'])]
    public function index(CarRepository $carRepository): Response
    {
        return $this->render('car/index.html.twig', [
            'cars' => $carRepository->findAll(),
        ]);
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
    public function show(Car $car): Response
    {
        return $this->render('car/show.html.twig', [
            'car' => $car,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_car_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('car/edit.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_car_delete', methods: ['POST'])]
    public function delete(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $car->getId(), $request->request->get('_token'))) {
            $entityManager->remove($car);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
    }
}
