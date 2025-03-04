<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    // Relación con el comprador
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "buyer_id", referencedColumnName: "id")]
    private ?User $buyer = null;

    // Relación con el coche comprado
    #[ORM\ManyToOne(targetEntity: Car::class)]
    #[ORM\JoinColumn(name: "car_id", referencedColumnName: "CarID")]
    private ?Car $car = null;

    // El precio del coche en el momento de la compra
    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private ?float $price = null;

    // El estado de la transacción (pendiente, completada, cancelada, etc.)
    #[ORM\Column(type: "string", length: 20)]
    private ?string $status = null;

    // Fecha y hora de la transacción
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $transactionDate = null;

    public function __construct()
    {
        $this->transactionDate = new \DateTime();
    }

    // Métodos getter y setter

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBuyer(): ?User
    {
        return $this->buyer;
    }

    public function setBuyer(User $buyer): static
    {
        $this->buyer = $buyer;
        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(Car $car): static
    {
        $this->car = $car;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getTransactionDate(): ?\DateTimeInterface
    {
        return $this->transactionDate;
    }

    public function setTransactionDate(\DateTimeInterface $transactionDate): static
    {
        $this->transactionDate = $transactionDate;
        return $this;
    }
}
