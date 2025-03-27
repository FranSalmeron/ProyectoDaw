<?php

namespace App\Message;

use App\Message\LoadMessagesMessage;
use App\Repository\ChatMessageRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Chat;
use Psr\Log\LoggerInterface;

class MessageHandler implements MessageHandlerInterface
{
    private ChatMessageRepository $chatMessageRepository;
    private EntityManagerInterface $entityManager;
    private CacheInterface $cache;
    private LoggerInterface $logger;

    public function __construct(ChatMessageRepository $chatMessageRepository, EntityManagerInterface $entityManager, CacheInterface $cache, LoggerInterface $logger)
    {
        $this->chatMessageRepository = $chatMessageRepository;
        $this->entityManager = $entityManager;
        $this->cache = $cache;
        $this->logger = $logger;
    }

    public function __invoke(LoadMessagesMessage $message)
    {
        $this->logger->info('taskId recibido en MessageHandler: ' . $message->getTaskId());

        // Recuperar el chat correspondiente
        $chat = $this->entityManager->getRepository(Chat::class)->find($message->getChatId());

        if (!$chat) {
            // Emitir evento si el chat no existe
            $this->logger->info('Chat no encontrado para taskId: ' . $message->getTaskId());
            return;
        }

        // Obtener todos los mensajes de ese chat (ordenados por fecha)
        $messages = $this->chatMessageRepository->findBy(['chat' => $chat], ['messageDate' => 'ASC']);

        // Preparar los mensajes para guardar en caché
        $data = [];
        foreach ($messages as $msg) {
            $data[] = [
                'messageId' => $msg->getIdMessage(),
                'content' => $msg->getContent(),
                'userId' => $msg->getUser()->getId(),
                'messageDate' => $msg->getMessageDate()->format('Y-m-d H:i:s'),
            ];
        }

        // Borrar la caché previa para este taskId
        $this->logger->info('Borrando caché para taskId: ' . $message->getTaskId());
        $this->cache->delete($message->getTaskId());

        // Actualizar la caché con los nuevos mensajes
        $this->cache->get($message->getTaskId(), function (ItemInterface $item) use ($data) {
            $item->expiresAfter(3600); // Expira en 1 hora
            return $data;  // Nuevos mensajes
        });

        // Log de la actualización de la caché
        $this->logger->info('Caché actualizada para taskId: ' . $message->getTaskId());
    }
}
