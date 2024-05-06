<?php

namespace App\Entity;

use App\Repository\InterventionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterventionsRepository::class)]
class Interventions
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $debutIntervention = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $finIntervention = null;

    #[ORM\Column(nullable: true)]
    private ?float $duree = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $CR = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $facture = null;

    #[ORM\Column(nullable: true)]
    private ?float $prix = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bonDeCommande = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $PJAjout = null;

    #[ORM\Column(nullable: true)]
    private ?bool $public = null;

    #[ORM\ManyToOne(inversedBy: 'interventions')]
    private ?SiteUtilitaire $SiteUtilitaire = null;

    #[ORM\ManyToOne(inversedBy: 'interventions')]
    private ?Clients $Client = null;

    /**
     * @var Collection<int, vehicules>
     */
    #[ORM\ManyToMany(targetEntity: vehicules::class, inversedBy: 'interventions')]
    private Collection $vehicule;

    /**
     * @var Collection<int, adresseInterventions>
     */
    #[ORM\ManyToMany(targetEntity: adresseInterventions::class, inversedBy: 'interventions')]
    private Collection $adresseintervention;

    public function __construct()
    {
        $this->vehicule = new ArrayCollection();
        $this->adresseintervention = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDebutIntervention(): ?\DateTimeInterface
    {
        return $this->debutIntervention;
    }

    public function setDebutIntervention(?\DateTimeInterface $debutIntervention): static
    {
        $this->debutIntervention = $debutIntervention;

        return $this;
    }

    public function getFinIntervention(): ?\DateTimeInterface
    {
        return $this->finIntervention;
    }

    public function setFinIntervention(\DateTimeInterface $finIntervention): static
    {
        $this->finIntervention = $finIntervention;

        return $this;
    }

    public function getDuree(): ?float
    {
        return $this->duree;
    }

    public function setDuree(?float $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getCR(): ?string
    {
        return $this->CR;
    }

    public function setCR(?string $CR): static
    {
        $this->CR = $CR;

        return $this;
    }

    public function getFacture(): ?string
    {
        return $this->facture;
    }

    public function setFacture(?string $facture): static
    {
        $this->facture = $facture;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

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

    public function getBonDeCommande(): ?string
    {
        return $this->bonDeCommande;
    }

    public function setBonDeCommande(?string $bonDeCommande): static
    {
        $this->bonDeCommande = $bonDeCommande;

        return $this;
    }

    public function getPJAjout(): ?string
    {
        return $this->PJAjout;
    }

    public function setPJAjout(?string $PJAjout): static
    {
        $this->PJAjout = $PJAjout;

        return $this;
    }

    public function isPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(?bool $public): static
    {
        $this->public = $public;

        return $this;
    }

    public function getSiteUtilitaire(): ?SiteUtilitaire
    {
        return $this->SiteUtilitaire;
    }

    public function setSiteUtilitaire(?SiteUtilitaire $SiteUtilitaire): static
    {
        $this->SiteUtilitaire = $SiteUtilitaire;

        return $this;
    }

    public function getClient(): ?Clients
    {
        return $this->Client;
    }

    public function setClient(?Clients $Client): static
    {
        $this->Client = $Client;

        return $this;
    }

    /**
     * @return Collection<int, vehicules>
     */
    public function getVehicule(): Collection
    {
        return $this->vehicule;
    }

    public function addVehicule(vehicules $vehicule): static
    {
        if (!$this->vehicule->contains($vehicule)) {
            $this->vehicule->add($vehicule);
        }

        return $this;
    }

    public function removeVehicule(vehicules $vehicule): static
    {
        $this->vehicule->removeElement($vehicule);

        return $this;
    }

    /**
     * @return Collection<int, adresseInterventions>
     */
    public function getAdresseintervention(): Collection
    {
        return $this->adresseintervention;
    }

    public function addAdresseintervention(adresseInterventions $adresseintervention): static
    {
        if (!$this->adresseintervention->contains($adresseintervention)) {
            $this->adresseintervention->add($adresseintervention);
        }

        return $this;
    }

    public function removeAdresseintervention(adresseInterventions $adresseintervention): static
    {
        $this->adresseintervention->removeElement($adresseintervention);

        return $this;
    }
}
