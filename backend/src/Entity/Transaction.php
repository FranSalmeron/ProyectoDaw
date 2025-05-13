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
    #[ORM\JoinColumn(name: "car_id", referencedColumnName: "id")]  
    private ?Car $car = null;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private ?float $price = null;

    // El estado de la transacción (pendiente, completada, cancelada, etc.)
    #[ORM\Column(type: "string", length: 20)]
    private ?string $status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $transactionDate = null;

    // **Campos añadidos**
    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private ?float $commission = null;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private ?float $totalIncome = null;

    #[ORM\Column(type: "boolean")]
    private bool $isIncomeReported = false;

    // **Constructor**
    public function __construct()
    {
        $this->transactionDate = new \DateTime();
    }

    // **Métodos existentes** (sin cambios)
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
        $this->calculateCommission(); // Calcula la comisión automáticamente al setear el precio
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

    // **Métodos añadidos**
    public function getCommission(): ?float
    {
        return $this->commission;
    }

    public function setCommission(float $commission): static
    {
        $this->commission = $commission;
        return $this;
    }

    public function getTotalIncome(): ?float
    {
        return $this->totalIncome;
    }

    public function setTotalIncome(float $totalIncome): static
    {
        $this->totalIncome = $totalIncome;
        return $this;
    }

    public function getIsIncomeReported(): bool
    {
        return $this->isIncomeReported;
    }

    public function setIsIncomeReported(bool $isIncomeReported): static
    {
        $this->isIncomeReported = $isIncomeReported;
        return $this;
    }

    // **Lógica para calcular la comisión (20% del precio de la venta)**
    public function calculateCommission(): void
    {
        if ($this->price) {
            $this->commission = $this->price * 0.20;  // Calcula el 20% de la venta
            $this->totalIncome = $this->commission;  // El total que te corresponde es igual a la comisión
        }
    }
}
