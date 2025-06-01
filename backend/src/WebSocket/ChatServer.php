<?php
// src/WebSocket/ChatServer.php
namespace App\WebSocket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ChatMessage;
use App\Repository\ChatRepository;
use App\Repository\UserRepository;

class ChatServer implements MessageComponentInterface
{
    protected \SplObjectStorage $clients;
    protected array $chatClients = [];
    private EntityManagerInterface $em;
    private UserRepository $userRepo;
    private ChatRepository $chatRepo;

    public function __construct(EntityManagerInterface $em, UserRepository $userRepo, ChatRepository $chatRepo)
    {
        $this->clients = new \SplObjectStorage();
        $this->em = $em;
        $this->userRepo = $userRepo;
        $this->chatRepo = $chatRepo;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $queryParams = [];
        parse_str(parse_url($conn->httpRequest->getUri(), PHP_URL_QUERY), $queryParams);

        $chatId = $queryParams['chatId'] ?? null;
        if ($chatId) {
            $this->clients->attach($conn);
            $conn->chatId = $chatId;

            if (!isset($this->chatClients[$chatId])) {
                $this->chatClients[$chatId] = new \SplObjectStorage();
            }

            $this->chatClients[$chatId]->attach($conn);
        } else {
            $conn->close();
        }
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg, true);

        $chatId = $data['chatId'] ?? null;
        $userId = $data['userId'] ?? null;
        $content = $data['message'] ?? null;

        if (!$chatId || !$userId || !$content) {
            return;
        }

        $chat = $this->chatRepo->find($chatId);
        $user = $this->userRepo->find($userId);

        if (!$chat || !$user) {
            return;
        }

        // Guardar en la base de datos
        $message = new ChatMessage();
        $message->setChat($chat);
        $message->setUser($user);
        $message->setContent($content);
        $message->setMessageDate(new \DateTime());

        $this->em->persist($message);
        $this->em->flush();

        $formatted = json_encode([
            'chatId' => $chatId,
            'messageId' => $message->getIdMessage(),
            'userId' => $user->getId(),
            'content' => $message->getContent(),
            'messageDate' => $message->getMessageDate()->format('Y-m-d H:i:s'),
        ]);

        // Emitir sólo a los usuarios conectados al mismo chat
        foreach ($this->chatClients[$chatId] ?? [] as $client) {
            $client->send($formatted);
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        $chatId = $conn->chatId ?? null;
        if ($chatId && isset($this->chatClients[$chatId])) {
            $this->chatClients[$chatId]->detach($conn);
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        $conn->close();
    }
}
