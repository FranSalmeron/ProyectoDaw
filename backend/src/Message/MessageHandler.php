<?php

namespace App\Message;

use App\Message\LoadMessagesMessage;
use App\Repository\ChatMessageRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Chat;

class MessageHandler implements MessageHandlerInterface
{
    private ChatMessageRepository $chatMessageRepository;
    private EntityManagerInterface $entityManager;
    private CacheInterface $cache;

    public function __construct(ChatMessageRepository $chatMessageRepository, EntityManagerInterface $entityManager, CacheInterface $cache)
    {
        $this->chatMessageRepository = $chatMessageRepository;
        $this->entityManager = $entityManager;
        $this->cache = $cache;
    }

    public function __invoke(LoadMessagesMessage $message)
    {
        // Recuperar el chat correspondiente
        $chat = $this->entityManager->getRepository(Chat::class)->find($message->getChatId());

        if (!$chat) {
            // Emitir evento si el chat no existe
            return;
        }

        // Obtener todos los mensajes de ese chat
        $messages = $this->chatMessageRepository->findBy(['chat' => $chat], ['messageDate' => 'ASC']);

        // Guardar los mensajes en caché, incluso si están vacíos
        $data = [];
        foreach ($messages as $msg) {
            $data[] = [
                'messageId' => $msg->getIdMessage(),
                'content' => $msg->getContent(),
                'userId' => $msg->getUser()->getId(),
                'messageDate' => $msg->getMessageDate()->format('Y-m-d H:i:s'),
            ];
        }

        // Asegurarse de que siempre es un array (vacío si no hay mensajes)
        $this->cache->get($message->getTaskId(), function (ItemInterface $item) use ($data) {
            $item->expiresAfter(3600); // Expira en 1 hora
            return $data;
        });
    }
}
