<?php

namespace App\Entity;

use App\Repository\CollaborateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CollaborateursRepository::class)]
class Collaborateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $poste = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_integration = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(length: 25)]
    private ?string $role = null;

    /**
     * @var Collection<int, Formations>
     */
    #[ORM\ManyToMany(targetEntity: Formations::class, mappedBy: 'IdCollaborateurs')]
    private Collection $IdFormations;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateurs $Utilisateurs = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    public function __construct()
    {
        $this->IdFormations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(?string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    public function getDateIntegration(): ?\DateTimeInterface
    {
        return $this->date_integration;
    }

    public function setDateIntegration(?\DateTimeInterface $date_integration): static
    {
        $this->date_integration = $date_integration;

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

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, Formations>
     */
    public function getIdFormations(): Collection
    {
        return $this->IdFormations;
    }

    public function addIdFormations(Formations $idFormations): static
    {
        if (!$this->IdFormations->contains($idFormations)) {
            $this->IdFormations->add($idFormations);
            $idFormations->addIdCollaborateur($this);
        }

        return $this;
    }

    public function removeIdFormations(Formations $idFormations): static
    {
        if ($this->IdFormations->removeElement($idFormations)) {
            $idFormations->removeIdCollaborateur($this);
        }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
