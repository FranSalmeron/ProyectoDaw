<?php

namespace App\Entity;

use App\Repository\ChatMessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChatMessageRepository::class)]
class ChatMessage
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer")]
    private ?int $idMessage = null;

    #[ORM\ManyToOne(targetEntity: Chat::class, cascade: ['remove'])]
    #[ORM\JoinColumn(name: "chat_id", referencedColumnName: "id")]
    private ?Chat $chat = null;

    #[ORM\ManyToOne(targetEntity: User::class, cascade: ['remove'])]
    #[ORM\JoinColumn(name: "user_id", referencedColumnName: "id")]
    private ?User $user = null;

    #[ORM\Column(type: "text")]
    private ?string $content = null;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $messageDate;

    public function __construct()
    {
        $this->messageDate = new \DateTime();
    }

    // Getters y setters
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): self
    {
        $this->chat = $chat;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getMessageDate(): \DateTimeInterface
    {
        return $this->messageDate;
    }

    public function setMessageDate(\DateTimeInterface $messageDate): self
    {
        $this->messageDate = $messageDate;
        return $this;
    }

    public function getIdMessage(): ?int
    {
        return $this->idMessage;
    }

    public function setIdMessage(int $idMessage): self
    {
        $this->idMessage = $idMessage;
        return $this;
    }
}
