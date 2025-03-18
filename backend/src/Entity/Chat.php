<?php

namespace App\Entity;

use App\Repository\ChatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChatRepository::class)]
class Chat
{
   
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;  

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "buyer_id", referencedColumnName: "id")]
    private ?User $buyer = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "seller_id", referencedColumnName: "id")]
    private ?User $seller = null;

    #[ORM\ManyToOne(targetEntity: Car::class)]
    #[ORM\JoinColumn(name: "car_id", referencedColumnName: "id")]
    private ?Car $car = null;  

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $createdDate;

    public function __construct()
    {
        $this->createdDate = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
  
    public function getbuyer(): ?User
    {
        return $this->buyer;
    }

    public function setbuyer(User $buyer): self
    {
        $this->buyer = $buyer;
        return $this;
    }

    public function getseller(): ?User
    {
        return $this->seller;
    }

    public function setseller(User $seller): self
    {
        $this->seller = $seller;
        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(Car $car): self
    {
        $this->car = $car;
        return $this;
    }

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
