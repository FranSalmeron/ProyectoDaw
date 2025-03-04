<?php

namespace App\Entity;

use App\Repository\ChatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChatRepository::class)]
class Chat
{
    // Cambiar 'ChatID' por 'id' y hacerlo clave primaria con generación automática
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;  // Cambio de ChatID a id

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "user1_id", referencedColumnName: "id")]
    private ?User $user1 = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "user2_id", referencedColumnName: "id")]
    private ?User $user2 = null;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $createdDate;

    public function __construct()
    {
        $this->createdDate = new \DateTime();
    }

    // Getter y setter para 'id'
    public function getId(): ?int
    {
        return $this->id;
    }

    // Getter y setter para 'user1'
    public function getUser1(): ?User
    {
        return $this->user1;
    }

    public function setUser1(User $user1): self
    {
        $this->user1 = $user1;
        return $this;
    }

    // Getter y setter para 'user2'
    public function getUser2(): ?User
    {
        return $this->user2;
    }

    public function setUser2(User $user2): self
    {
        $this->user2 = $user2;
        return $this;
    }

    // Getter y setter para 'createdDate'
    public function getCreatedDate(): \DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTimeInterface $createdDate): self
    {
        $this->createdDate = $createdDate;
        return $this;
    }
}
