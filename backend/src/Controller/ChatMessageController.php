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
use Doctrine\DBAL\Types\GuidType;
use Symfony\Component\Messenger\MessageBusInterface;
use Ramsey\Uuid\Guid\Guid;
use Symfony\Contracts\Cache\CacheInterface;

#[Route('/ChatMessage')]
class ChatMessageController extends AbstractController
{
    private MessageBusInterface $bus;
    private CacheInterface $cache;

    public function __construct(MessageBusInterface $bus, CacheInterface $cache)
    {
        $this->bus = $bus;  // Inyectamos el bus de mensajes
        $this->cache = $cache; // Inyectamos el servicio de cache
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
        $userId = $data['userId'] ?? null;  // Obtener el userId de la solicitud

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

        return $this->json([
            'success' => true,
            'message' => 'Mensaje enviado exitosamente.',
            'chatMessageId' => $chatMessage->getIdMessage(),
        ]);
    }

    // Iniciar carga de mensajes en background (asíncrono)
    #[Route('/{chatId}/messages', name: 'app_ChatMessage_load_messages', methods: ['GET'])]
    public function loadMessages(int $chatId): JsonResponse
    {
        // Generar un taskId único para el polling
        $taskId = Guid::uuid4()->toString();

        // Enviar mensaje para procesar la carga de mensajes de manera asíncrona
        $message = new LoadMessagesMessage($chatId, $taskId);
        $this->bus->dispatch($message);

        // Responder con el taskId generado
        return new JsonResponse([
            'status' => 'Message dispatched',
            'taskId' => $taskId
        ]);
    }

    // Consultar el estado de la tarea (polling)
    #[Route('/task/{taskId}', name: 'app_check_task_status', methods: ['GET'])]
    public function checkTaskStatus(string $taskId): JsonResponse
    {
        // Consultar el estado de la tarea en la cache
        $data = $this->cache->get($taskId, function () {
            return null; // Si la tarea no existe, retorna null
        });

        // Si la tarea está completa, devolvemos los mensajes
        if ($data) {
            return new JsonResponse([
                'status' => 'completed',
                'data' => $data,
            ]);
        }

        // Si la tarea sigue pendiente, devolver el estado pendiente
        return new JsonResponse(['status' => 'pending']);
    }
}
