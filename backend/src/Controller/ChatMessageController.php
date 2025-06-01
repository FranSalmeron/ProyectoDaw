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
use App\Repository\ChatMessageRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

#[Route('/ChatMessage')]
class ChatMessageController extends AbstractController
{
    private CacheInterface $cache;
    private LoggerInterface $logger;

    public function __construct( CacheInterface $cache,  LoggerInterface $logger)
    {
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
    #[Route('/{chatId}/messages', name: 'app_ChatMessage_load_messages', methods: ['GET'])]
    public function loadMessages(int $chatId, ChatRepository $chatRepository, ChatMessageRepository $chatMessageRepository): JsonResponse
    {
        // Verificar si el chat existe
        $chat = $chatRepository->find($chatId);
        if (!$chat) {
            return $this->json([
                'success' => false,
                'message' => 'El chat no existe.',
            ], Response::HTTP_NOT_FOUND);
        }
    
        // Obtener todos los mensajes del chat, ordenados por fecha
        $messages = $chatMessageRepository->findBy(
            ['chat' => $chat],
            ['messageDate' => 'ASC']
        );
    
        // Formatear los mensajes para la respuesta JSON
        $formattedMessages = array_map(function (ChatMessage $message) {
            return [
                'messageId' => $message->getIdMessage(),
                'content' => $message->getContent(),
                'userId' => $message->getUser()->getId(),
                'messageDate' => $message->getMessageDate()->format('Y-m-d H:i:s'),
            ];
        }, $messages);
    
        return $this->json([
            'success' => true,
            'messages' => $formattedMessages,
        ]);
    }
}
