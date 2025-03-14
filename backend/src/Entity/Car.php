<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    #[Groups('car_list')] 
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups('car_list')] 
    private ?string $brand = null;

    #[ORM\Column(length: 100)]
    #[Groups('car_list')] 
    private ?string $model = null;

    #[ORM\Column]
    #[Groups('car_list')] 
    private ?int $manufacture_year = null;

    #[ORM\Column]
    #[Groups('car_list')] 
    private ?int $mileage = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Groups('car_list')] 
    private ?string $price = null;

    #[ORM\Column(length: 50)]
    #[Groups('car_list')] 
    private ?string $color = null;

    #[ORM\Column(length: 50)]
    #[Groups('car_list')] 
    private ?string $fuelType = null;

    #[ORM\Column(length: 50)]
    #[Groups('car_list')] 
    private ?string $transmission = null;

    #[ORM\Column(length: 50)]
    #[Groups('car_list')] 
    private ?string $traction = null;


    #[ORM\Column]
    #[Groups('car_list')] 
    private ?int $doors = null;

    #[ORM\Column]
    #[Groups('car_list')] 
    private ?int $seats = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups('car_list')] 
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups('car_list')] 
    private ?\DateTimeInterface $publication_date = null;

    #[ORM\Column(length: 50)]
    #[Groups('car_list')] 
    private ?string $CarCondition = null;

    #[ORM\Column(type: "json", nullable: true)]
    #[Groups('car_list')] 
    private ?array $images = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    #[Groups('car_list')] 
    private ?bool $CarSold = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    #[Groups('car_list')]
    private ?User $User = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 6)]
    #[Groups('car_list')] 
    private ?string $lat = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 6)]
    #[Groups('car_list')] 
    private ?string $lon = null;

    #[ORM\Column(length: 255)]
    #[Groups('car_list')]
    private ?string $city = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;
        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;
        return $this;
    }

    public function getManufactureYear(): ?int
    {
        return $this->manufacture_year;
    }

    public function setManufactureYear(int $manufacture_year): static
    {
        $this->manufacture_year = $manufacture_year;
        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): static
    {
        $this->mileage = $mileage;
        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;
        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;
        return $this;
    }

    public function getFuelType(): ?string
    {
        return $this->fuelType;
    }

    public function setFuelType(string $fuelType): static
    {
        $this->fuelType = $fuelType;
        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(string $transmission): static
    {
        $this->transmission = $transmission;
        return $this;
    }

    public function getTraction(): ?string
    {
        return $this->traction;
    }

    public function setTraction(string $traction): static
    {
        $this->traction = $traction;
        return $this;
    }

    public function getDoors(): ?int
    {
        return $this->doors;
    }

    public function setDoors(int $doors): static
    {
        $this->doors = $doors;
        return $this;
    }

    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): static
    {
        $this->seats = $seats;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publication_date;
    }

    public function setPublicationDate(\DateTimeInterface $publication_date): static
    {
        $this->publication_date = $publication_date;
        return $this;
    }

    public function getCarCondition(): ?string
    {
        return $this->CarCondition;
    }

    public function setCarCondition(string $CarCondition): static
    {
        $this->CarCondition = $CarCondition;
        return $this;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(?array $images): static
    {
        $this->images = $images;
        return $this;
    }

    public function isCarSold(): ?bool
    {
        return $this->CarSold;
    }

    public function setCarSold(bool $CarSold): static
    {
        $this->CarSold = $CarSold;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }

    public function getLat(): ?string
    {
        return $this->lat;
    }

    public function setLat(string $lat): static
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon(): ?string
    {
        return $this->lon;
    }

    public function setLon(string $lon): static
    {
        $this->lon = $lon;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }
}
