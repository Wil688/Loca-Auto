<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $plate;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorieCar;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $brandCar;

    /**
     * @ORM\ManyToOne(targetEntity=Engine::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $engineCar;

    /**
     * @ORM\ManyToOne(targetEntity=Seat::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $seatCar;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlate(): ?string
    {
        return $this->plate;
    }

    public function setPlate(string $plate): self
    {
        $this->plate = $plate;

        return $this;
    }

    public function getCategorieCar(): ?Categorie
    {
        return $this->categorieCar;
    }

    public function setCategorieCar(?Categorie $categorieCar): self
    {
        $this->categorieCar = $categorieCar;

        return $this;
    }

    public function getBrandCar(): ?Brand
    {
        return $this->brandCar;
    }

    public function setBrandCar(?Brand $brandCar): self
    {
        $this->brandCar = $brandCar;

        return $this;
    }

    public function getEngineCar(): ?Engine
    {
        return $this->engineCar;
    }

    public function setEngineCar(?Engine $engineCar): self
    {
        $this->engineCar = $engineCar;

        return $this;
    }

    public function getSeatCar(): ?Seat
    {
        return $this->seatCar;
    }

    public function setSeatCar(?Seat $seatCar): self
    {
        $this->seatCar = $seatCar;

        return $this;
    }

    

}
