<?php

namespace App\Entity;

use App\Repository\PleinVehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PleinVehiculeRepository::class)]
class PleinVehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(nullable: true)]
    private ?float $litres = null;

    #[ORM\Column(nullable: true)]
    private ?float $kmVehicules = null;

    #[ORM\ManyToOne(inversedBy: 'pleinVehicules')]
    private ?vehicules $vehicules = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLitres(): ?float
    {
        return $this->litres;
    }

    public function setLitres(?float $litres): static
    {
        $this->litres = $litres;

        return $this;
    }

    public function getKmVehicules(): ?float
    {
        return $this->kmVehicules;
    }

    public function setKmVehicules(?float $kmVehicules): static
    {
        $this->kmVehicules = $kmVehicules;

        return $this;
    }

    public function getVehicules(): ?vehicules
    {
        return $this->vehicules;
    }

    public function setVehicules(?vehicules $vehicules): static
    {
        $this->vehicules = $vehicules;

        return $this;
    }
}
