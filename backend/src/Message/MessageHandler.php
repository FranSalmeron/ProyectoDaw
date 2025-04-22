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

    public function __construct(
        ChatMessageRepository $chatMessageRepository,
        EntityManagerInterface $entityManager,
        CacheInterface $cache,
        LoggerInterface $logger
    ) {
        $this->chatMessageRepository = $chatMessageRepository;
        $this->entityManager = $entityManager;
        $this->cache = $cache;
        $this->logger = $logger;
    }

    public function __invoke(LoadMessagesMessage $message)
    {
        $taskId = $message->getTaskId();
        $chatId = $message->getChatId();

        $this->logger->info('🔄 taskId recibido en MessageHandler: ' . $taskId);

        // Recuperar el chat correspondiente
        $chat = $this->entityManager->getRepository(Chat::class)->find($chatId);

        if (!$chat) {
            $this->logger->warning('❌ Chat no encontrado para taskId: ' . $taskId);
            return;
        }

        // Obtener todos los mensajes de ese chat (ordenados por fecha)
        $messages = $this->chatMessageRepository->findBy(
            ['chat' => $chat],
            ['messageDate' => 'ASC']
        );

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

        $this->logger->info('📦 Preparando caché para taskId: ' . $taskId . ' con ' . count($data) . ' mensajes');

        // Eliminar caché previa si existe
        $this->cache->delete($taskId);

        // Guardar en caché aunque esté vacío
        $this->cache->get($taskId, function (ItemInterface $item) use ($data) {
            $item->expiresAfter(3600); // 1 hora de duración
            return $data;
        });

        $this->logger->info('✅ Caché actualizada para taskId: ' . $taskId);
    }
}
