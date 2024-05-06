<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(length: 100)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rue = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codePostal = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateurs $Utilisateurs = null;

    /**
     * @var Collection<int, AdresseInterventions>
     */
    #[ORM\OneToMany(targetEntity: AdresseInterventions::class, mappedBy: 'Client')]
    private Collection $Clients;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'clients')]
    private ?adressefacturation $Facturation = null;

    /**
     * @var Collection<int, Interventions>
     */
    #[ORM\OneToMany(targetEntity: Interventions::class, mappedBy: 'Client')]
    private Collection $interventions;

    public function __construct()
    {
        $this->Clients = new ArrayCollection();
        $this->interventions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(?string $rue): static
    {
        $this->rue = $rue;

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

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getUtilisateurs(): ?Utilisateurs
    {
        return $this->Utilisateurs;
    }

    public function setUtilisateurs(Utilisateurs $Utilisateurs): static
    {
        $this->Utilisateurs = $Utilisateurs;

        return $this;
    }

    /**
     * @return Collection<int, AdresseInterventions>
     */
    public function getClients(): Collection
    {
        return $this->Clients;
    }

    public function addClient(AdresseInterventions $client): static
    {
        if (!$this->Clients->contains($client)) {
            $this->Clients->add($client);
            $client->setClient($this);
        }

        return $this;
    }

    public function removeClient(AdresseInterventions $client): static
    {
        if ($this->Clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getClient() === $this) {
                $client->setClient(null);
            }
        }

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

    public function getFacturation(): ?adressefacturation
    {
        return $this->Facturation;
    }

    public function setFacturation(?adressefacturation $Facturation): static
    {
        $this->Facturation = $Facturation;

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
            $intervention->setClient($this);
        }

        return $this;
    }

    public function removeIntervention(Interventions $intervention): static
    {
        if ($this->interventions->removeElement($intervention)) {
            // set the owning side to null (unless already changed)
            if ($intervention->getClient() === $this) {
                $intervention->setClient(null);
            }
        }

        return $this;
    }
}
