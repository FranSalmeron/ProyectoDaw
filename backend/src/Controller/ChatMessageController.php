<?php

namespace App\Controller;

use App\Entity\ChatMessage;
use App\Repository\ChatMessageRepository;
use App\Repository\ChatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

#[Route('/ChatMessage')]
class ChatMessageController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    // Obtener todos los mensajes de un chat
    #[Route('/{chatId}/messages', name: 'app_ChatMessage_message_get_all', methods: ['GET'])]
    public function getAllMessages(int $chatId, ChatMessageRepository $chatMessageRepository): Response
    {
        $this->logger->info("Recibiendo mensajes para el chatId: $chatId");

        $messages = $chatMessageRepository->findBy(['chat' => $chatId], ['messageDate' => 'ASC']);

        $this->logger->info("Se encontraron " . count($messages) . " mensajes para el chatId: $chatId");

        $messagesData = [];
        foreach ($messages as $message) {
            $messagesData[] = [
                'messageId' => $message->getIdMessage(),
                'userId' => $message->getUser()->getId(),
                'content' => $message->getContent(),
                'messageDate' => $message->getMessageDate()->format('Y-m-d H:i:s'),
            ];
        }

        // Siempre devolver respuesta JSON
        return $this->json([
            'success' => true,
            'messages' => $messagesData,
        ]);
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

    // Editar un mensaje
    #[Route('/{chatMessage}/edit', name: 'app_ChatMessage_message_edit', methods: ['POST'])]
    public function edit(Request $request, ChatMessage $chatMessage, EntityManagerInterface $entityManager): Response
    {
        $originalMessageDate = $chatMessage->getMessageDate();
        $messageContent = $request->get('content');  // Obtener el nuevo contenido del mensaje desde la solicitud

        if ($messageContent) {
            $chatMessage->setContent($messageContent);  // Establecer el nuevo contenido
        }

        $chatMessage->setMessageDate($originalMessageDate);  // No modificar la fecha de creación

        $entityManager->flush();

        return $this->json([
            'success' => true,
            'message' => 'Mensaje editado exitosamente.',
            'chatMessageId' => $chatMessage->getIdMessage(),
        ]);
    }

    // Eliminar un mensaje
    #[Route('/{ChatMessage}/delete', name: 'app_ChatMessage_message_delete', methods: ['POST'])]
    public function delete(Request $request, ChatMessage $ChatMessage, EntityManagerInterface $entityManager): Response
    {
        
            $entityManager->remove($ChatMessage);
            $entityManager->flush();

        return $this->json([
            'success' => true,
            'message' => 'Mensaje eliminado exitosamente.',
        ]);
    }
    
    #[Route('/{chatId}/send', name: 'app_ChatMessage_message_send', methods: ['POST'])]
    public function sendMessage(int $chatId, Request $request, EntityManagerInterface $entityManager, ChatRepository $chatRepository): Response
    {
        // Decodificar el cuerpo de la solicitud (JSON)
        $data = json_decode($request->getContent(), true);
    
        // Verificar que el contenido del mensaje esté presente
        $messageContent = $data['message'] ?? null;
    
        if (!$messageContent) {
            return $this->json([
                'success' => false,
                'message' => 'El contenido del mensaje no puede estar vacío.',
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
    
        // Verificar que el usuario esté autenticado
        $user = $this->getUser();
        if (!$user) {
            return $this->json([
                'success' => false,
                'message' => 'Usuario no autenticado.',
            ], Response::HTTP_UNAUTHORIZED);
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
}    