<?php

namespace App\Controller;

use App\Entity\ChatMessage;
use App\Repository\ChatRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Message\LoadMessagesMessage;
use App\Entity\Chat;
use App\Repository\ChatMessageRepository;
use Doctrine\DBAL\Types\GuidType;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Ramsey\Uuid\Guid\Guid;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

#[Route('/ChatMessage')]
class ChatMessageController extends AbstractController
{
    private MessageBusInterface $bus;
    private CacheInterface $cache;
    private LoggerInterface $logger;

    public function __construct(MessageBusInterface $bus, CacheInterface $cache,  LoggerInterface $logger)
    {
        $this->bus = $bus;  // Inyectamos el bus de mensajes
        $this->cache = $cache; // Inyectamos el servicio de cache
        $this->logger = $logger;
    }
    // Mostrar un mensaje específico
    #[Route('/{ChatMessage}', name: 'app_ChatMessage_message_show', methods: ['GET'])]
    public function show(ChatMessage $ChatMessage): Response
    {
        return $this->json([
            'messageId' => $ChatMessage->getIdMessage(),
            'content' => $ChatMessage->getContent(),
            'userId' => $ChatMessage->getUser()->getId(),
            'messageDate' => $ChatMessage->getMessageDate()->format('Y-m-d H:i:s'),
        ]);
    }

    // Enviar un mensaje
    #[Route('/{chatId}/send', name: 'app_ChatMessage_message_send', methods: ['POST'])]
    public function sendMessage(int $chatId, Request $request, EntityManagerInterface $entityManager, ChatRepository $chatRepository, UserRepository $userRepository): Response
    {
        // Decodificar el cuerpo de la solicitud (JSON)
        $data = json_decode($request->getContent(), true);

        // Verificar que el contenido del mensaje esté presente
        $messageContent = $data['message'] ?? null;
        $userId = $data['userId'] ?? null;

        if (!$messageContent) {
            return $this->json([
                'success' => false,
                'message' => 'El contenido del mensaje no puede estar vacío.',
            ], Response::HTTP_BAD_REQUEST);
        }

        if (!$userId) {
            return $this->json([
                'success' => false,
                'message' => 'El userId es necesario.',
            ], Response::HTTP_BAD_REQUEST);
        }

        // Buscar el chat por ID
        $chat = $chatRepository->find($chatId);
        if (!$chat) {
            return $this->json([
                'success' => false,
                'message' => 'El chat no existe.',
            ], Response::HTTP_NOT_FOUND);
        }

        // Buscar el usuario por ID
        $user = $userRepository->find($userId);
        if (!$user) {
            return $this->json([
                'success' => false,
                'message' => 'Usuario no encontrado.',
            ], Response::HTTP_NOT_FOUND);
        }

        // Crear y persistir el nuevo mensaje
        $chatMessage = new ChatMessage();
        $chatMessage->setChat($chat);
        $chatMessage->setUser($user);
        $chatMessage->setContent($messageContent);
        $chatMessage->setMessageDate(new \DateTime());

        $entityManager->persist($chatMessage);
        $entityManager->flush();

        // Devolver respuesta de éxito
        return $this->json([
            'success' => true,
            'message' => 'El mensaje se ha subido correctamente a la base de datos.',
        ]);
    }

 
    #[Route('/task/{taskId}', name: 'app_check_task_status', methods: ['GET'])]
    public function checkTaskStatus(string $taskId): JsonResponse
    {
        // Este truco devuelve null si no existe sin sobrescribir la caché
        $hasData = false;
        $data = $this->cache->get($taskId, function (ItemInterface $item) use (&$hasData) {
            $hasData = false; // No está presente, no sobrescribimos
            // No guardamos nada nuevo aquí
            $item->expiresAfter(0); // Expira inmediatamente si llega aquí
            return null;
        });
    
        if ($data !== null) {
            $this->logger->info('✅ Datos cargados de la caché para taskId: ' . $taskId);
            return new JsonResponse([
                'status' => 'completed',
                'data' => $data,
            ]);
        } else {
            $this->logger->info('⏳ No se encontraron datos en caché para taskId: ' . $taskId);
            return new JsonResponse(['status' => 'pending']);
        }
    }
    
    


    // Iniciar carga de mensajes en background (asíncrono)
    #[Route('/{chatId}/messages', name: 'app_ChatMessage_load_messages', methods: ['POST'])]
    public function loadMessages(int $chatId, Request $request): JsonResponse
    {
        // Obtener el taskId del parámetro de la solicitud
        $taskId = json_decode($request->getContent(), true);
        $this->logger->info('taskId recibido en la solicitud: ' . $taskId);

        if (!$taskId) {
            // Generar un nuevo taskId si no se proporciona uno
            $taskId = Guid::uuid4()->toString();
            $this->logger->info('Generado nuevo taskId: ' . $taskId);
        }

        // Enviar mensaje para procesar la carga de mensajes de manera asíncrona
        $message = new LoadMessagesMessage($chatId, $taskId);
        $this->bus->dispatch($message);

        // Responder con el taskId utilizado
        return new JsonResponse([
            'status' => 'Message dispatched',
            'taskId' => $taskId
        ]);
    }
}
