<?php

namespace App\Controller;

use App\Entity\Chat;
use App\Entity\Car;
use App\Entity\User;
use App\Repository\ChatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

#[Route('/chat')]
class ChatController extends AbstractController
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    // Mostrar todos los chats
    #[Route('/', name: 'app_chat_car_index', methods: ['GET'])]
    public function show(ChatRepository $chatRepository): Response
    {
        $chats = $chatRepository->findAll();

        $chatsData = [];
        foreach ($chats as $chat) {
            $chatsData[] = [
                'chatId' => $chat->getId(),
                'buyer' => $chat->getBuyer()->getId(),
                'seller' => $chat->getSeller()->getId(),
                'car' => $chat->getCar()->getId(),
                'createdDate' => $chat->getCreatedDate()->format('Y-m-d H:i:s'),
            ];
        }

        return $this->json([
            'success' => true,
            'chats' => $chatsData,
        ]);
    }

    #[Route('/create', name: 'app_chat_car_create', methods: ['POST'])]
    public function createChat(Request $request, EntityManagerInterface $entityManager, ChatRepository $chatRepository): Response
    {
        // Obtener el cuerpo de la solicitud como JSON
        $data = json_decode($request->getContent(), true);

        // Verificar si los datos fueron correctamente decodificados
        if (!$data) {
            return $this->json([
                'success' => false,
                'message' => 'Datos JSON mal formados.',
            ], Response::HTTP_BAD_REQUEST);
        }

        // Recibir los parámetros del request desde el JSON decodificado
        $buyerId = $data['buyerId'] ?? null;
        $sellerId = $data['sellerId'] ?? null;
        $carId = $data['carId'] ?? null;

        // Logueamos los datos que recibimos
        $this->logger->info('Datos recibidos en la creación de chat', [
            'buyerId' => $buyerId,
            'sellerId' => $sellerId,
            'carId' => $carId,
        ]);

        // Validar que los IDs no sean nulos
        if (!$buyerId || !$sellerId || !$carId) {
            return $this->json([
                'success' => false,
                'message' => 'Todos los campos son requeridos.',
            ], Response::HTTP_BAD_REQUEST);
        }

        // Verificar que el comprador no sea el mismo que el vendedor
        if ($buyerId == $sellerId) {
            return $this->json([
                'success' => false,
                'message' => 'El comprador no puede ser el mismo que el vendedor.',
            ]);
        }

        // Verificar si ya existe un chat
        $existingChat = $chatRepository->findOneBy([
            'buyer' => $buyerId,
            'seller' => $sellerId,
            'car' => $carId,
        ]);

        if ($existingChat) {
            $this->logger->info('El chat ya existe', [
                'chatId' => $existingChat->getId(),
            ]);
            return $this->json([
                'success' => true,
                'message' => 'Chat ya existe.',
                'chatId' => $existingChat->getId(),
            ]);
        }

        // Buscar las entidades buyer, seller y car en la base de datos
        $buyer = $entityManager->getRepository(User::class)->find($buyerId);
        $seller = $entityManager->getRepository(User::class)->find($sellerId);
        $car = $entityManager->getRepository(Car::class)->find($carId);

        // Logueamos si no encontramos alguna entidad
        if (!$buyer) {
            $this->logger->error('No se encontró al comprador', ['buyerId' => $buyerId]);
        }
        if (!$seller) {
            $this->logger->error('No se encontró al vendedor', ['sellerId' => $sellerId]);
        }
        if (!$car) {
            $this->logger->error('No se encontró el coche', ['carId' => $carId]);
        }

        // Verificar si las entidades existen
        if (!$buyer || !$seller || !$car) {
            return $this->json([
                'success' => false,
                'message' => 'Buyer, Seller, o Car no existen.',
            ], Response::HTTP_BAD_REQUEST);
        }

        // Crear un nuevo chat
        $chat = new Chat();
        $chat->setBuyer($buyer);
        $chat->setSeller($seller);
        $chat->setCar($car);

        // Persistir el chat
        $entityManager->persist($chat);
        $entityManager->flush();

        // Logueamos que el chat se ha creado exitosamente
        $this->logger->info('Chat creado exitosamente', ['chatId' => $chat->getId()]);

        return $this->json([
            'success' => true,
            'message' => 'Chat creado exitosamente.',
            'chatId' => $chat->getId(),
        ]);
    }

    // Eliminar un chat por ID
    #[Route('/{id}/delete', name: 'app_chat_car_delete', methods: ['DELETE'])]
    public function delete(Request $request, Chat $chat, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($chat);
        $entityManager->flush();

        return $this->json([
            'success' => true,
            'message' => 'Chat eliminado exitosamente.',
            'chatId' => $chat->getId(),
        ]);
    }
    
    #[Route('/{userId}/chats', name: 'app_chat_user_chats', methods: ['GET'])]
    public function getUserChats($userId, ChatRepository $chatRepository): Response
    {
        // Buscar los chats donde el usuario sea el comprador o vendedor
        $chats = $chatRepository->createQueryBuilder('c')
            ->where('c.buyer = :userId')
            ->orWhere('c.seller = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getResult();

        // Crear una estructura de datos para enviar en la respuesta
        $chatsData = [];
        foreach ($chats as $chat) {
            $chatsData[] = [
                'chatId' => $chat->getId(),
                'buyer' => $chat->getBuyer()->getId(),
                'seller' => $chat->getSeller()->getId(),
                'car' => $chat->getCar()->getId(),
                'createdDate' => $chat->getCreatedDate()->format('Y-m-d H:i:s'),
            ];
        }

        // Retornar los chats en formato JSON
        return $this->json([
            'success' => true,
            'chats' => $chatsData,
        ]);
    }
}
