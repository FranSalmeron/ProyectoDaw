<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    // Relación con el vendedor (el usuario que recibe la reseña)
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "seller_id", referencedColumnName: "id")]
    private ?User $seller = null;
    #[ORM\Column(type: "integer")]
    private ?int $rating = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $review = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $reviewDate = null;

    public function __construct()
    {
        $this->reviewDate = new \DateTime();  // Inicializamos la fecha con la actual
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeller(): ?User
    {
        return $this->seller;
    }

    public function setSeller(User $seller): static
    {
        $this->seller = $seller;
        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): static
    {
        $this->rating = $rating;
        return $this;
    }

    public function getReview(): ?string
    {
        return $this->review;
    }

    public function setReview(?string $review): static
    {
        $this->review = $review;
        return $this;
    }

    public function getReviewDate(): ?\DateTimeInterface
    {
        return $this->reviewDate;
    }

    public function setReviewDate(\DateTimeInterface $reviewDate): static
    {
        $this->reviewDate = $reviewDate;
        return $this;
    }
}
