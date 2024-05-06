<?php

namespace App\Entity;

use App\Repository\VehiculesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculesRepository::class)]
class Vehicules
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type_vehicule = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_circulation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $debut_controletechnique = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fin_controletechnique = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pdf_controletechnique = null;

    /**
     * @var Collection<int, PleinVehicule>
     */
    #[ORM\OneToMany(targetEntity: PleinVehicule::class, mappedBy: 'vehicules')]
    private Collection $pleinVehicules;

    /**
     * @var Collection<int, siteUtilitaire>
     */
    #[ORM\ManyToMany(targetEntity: siteUtilitaire::class, inversedBy: 'vehicules')]
    private Collection $siteutilitaire;

    /**
     * @var Collection<int, Interventions>
     */
    #[ORM\ManyToMany(targetEntity: Interventions::class, mappedBy: 'vehicule')]
    private Collection $interventions;

    public function __construct()
    {
        $this->pleinVehicules = new ArrayCollection();
        $this->siteutilitaire = new ArrayCollection();
        $this->interventions = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeVehicule(): ?string
    {
        return $this->type_vehicule;
    }

    public function setTypeVehicule(?string $type_vehicule): static
    {
        $this->type_vehicule = $type_vehicule;

        return $this;
    }

    public function getDateCirculation(): ?\DateTimeInterface
    {
        return $this->date_circulation;
    }

    public function setDateCirculation(?\DateTimeInterface $date_circulation): static
    {
        $this->date_circulation = $date_circulation;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getDebutControletechnique(): ?\DateTimeInterface
    {
        return $this->debut_controletechnique;
    }

    public function setDebutControletechnique(?\DateTimeInterface $debut_controletechnique): static
    {
        $this->debut_controletechnique = $debut_controletechnique;

        return $this;
    }

    public function getFinControletechnique(): ?\DateTimeInterface
    {
        return $this->fin_controletechnique;
    }

    public function setFinControletechnique(?\DateTimeInterface $fin_controletechnique): static
    {
        $this->fin_controletechnique = $fin_controletechnique;

        return $this;
    }

    public function getPdfControletechnique(): ?string
    {
        return $this->pdf_controletechnique;
    }

    public function setPdfControletechnique(?string $pdf_controletechnique): static
    {
        $this->pdf_controletechnique = $pdf_controletechnique;

        return $this;
    }

    /**
     * @return Collection<int, PleinVehicule>
     */
    public function getPleinVehicules(): Collection
    {
        return $this->pleinVehicules;
    }

    public function addPleinVehicule(PleinVehicule $pleinVehicule): static
    {
        if (!$this->pleinVehicules->contains($pleinVehicule)) {
            $this->pleinVehicules->add($pleinVehicule);
            $pleinVehicule->setVehicules($this);
        }

        return $this;
    }

    public function removePleinVehicule(PleinVehicule $pleinVehicule): static
    {
        if ($this->pleinVehicules->removeElement($pleinVehicule)) {
            // set the owning side to null (unless already changed)
            if ($pleinVehicule->getVehicules() === $this) {
                $pleinVehicule->setVehicules(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, siteUtilitaire>
     */
    public function getSiteutilitaire(): Collection
    {
        return $this->siteutilitaire;
    }

    public function addSiteutilitaire(siteUtilitaire $siteutilitaire): static
    {
        if (!$this->siteutilitaire->contains($siteutilitaire)) {
            $this->siteutilitaire->add($siteutilitaire);
        }

        return $this;
    }

    public function removeSiteutilitaire(siteUtilitaire $siteutilitaire): static
    {
        $this->siteutilitaire->removeElement($siteutilitaire);

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
            $intervention->addVehicule($this);
        }

        return $this;
    }

    public function removeIntervention(Interventions $intervention): static
    {
        if ($this->interventions->removeElement($intervention)) {
            $intervention->removeVehicule($this);
        }

        return $this;
    }
}
