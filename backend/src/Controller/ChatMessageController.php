<?php

namespace App\Controller;

use App\Entity\ChatMessage;
use App\Repository\ChatMessageRepository;
use App\Repository\ChatRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Chat;

#[Route('/ChatMessage')]
class ChatMessageController extends AbstractController
{
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

    #[Route('/{chatId}/messages', name: 'app_ChatMessage_message_show', methods: ['GET'])]
    public function loadMessages(int $chatId, EntityManagerInterface $entityManager, ChatMessageRepository $chatMessageRepository): JsonResponse
    {
        // Recuperamos el Chat correspondiente al chatId
        $chat = $entityManager->getRepository(Chat::class)->find($chatId);

        if (!$chat) {
            return new JsonResponse(['error' => 'Chat not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        // Obtener todos los mensajes de ese chat
        $messages = $chatMessageRepository->findBy(['chat' => $chat], ['messageDate' => 'ASC']);

        // Preparar los datos para la respuesta JSON
        $data = [];
        foreach ($messages as $message) {
            $data[] = [
                'messageId' => $message->getIdMessage(),
                'content' => $message->getContent(),
                'userId' => $message->getUser()->getId(),
                'messageDate' => $message->getMessageDate()->format('Y-m-d H:i:s'),
            ];
        }

        // Retornar la respuesta JSON con los mensajes
        return new JsonResponse($data);
    }
}
