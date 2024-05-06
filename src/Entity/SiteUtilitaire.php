<?php

namespace App\Entity;

use App\Repository\SiteUtilitaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiteUtilitaireRepository::class)]
class SiteUtilitaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rue = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $codePostal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Vehicules>
     */
    #[ORM\ManyToMany(targetEntity: Vehicules::class, mappedBy: 'siteutilitaire')]
    private Collection $vehicules;

    /**
     * @var Collection<int, Interventions>
     */
    #[ORM\OneToMany(targetEntity: Interventions::class, mappedBy: 'SiteUtilitaire')]
    private Collection $interventions;

    public function __construct()
    {
        $this->vehicules = new ArrayCollection();
        $this->interventions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): static
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Vehicules>
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicules $vehicule): static
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules->add($vehicule);
            $vehicule->addSiteutilitaire($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicules $vehicule): static
    {
        if ($this->vehicules->removeElement($vehicule)) {
            $vehicule->removeSiteutilitaire($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Interventions>
     */
    public function getInterventions(): Collection
    {
        return $this->interventions;
    }

    public function addIntervention(Interventions $intervention): static
    {
        if (!$this->interventions->contains($intervention)) {
            $this->interventions->add($intervention);
            $intervention->setSiteUtilitaire($this);
        }

        return $this;
    }

    public function removeIntervention(Interventions $intervention): static
    {
        if ($this->interventions->removeElement($intervention)) {
            // set the owning side to null (unless already changed)
            if ($intervention->getSiteUtilitaire() === $this) {
                $intervention->setSiteUtilitaire(null);
            }
        }

        return $this;
    }
}
