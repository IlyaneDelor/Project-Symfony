<?php

namespace App\Entity;

use App\Repository\FormationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationsRepository::class)]
class Formations
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titreFormation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;


    /**
     * @var Collection<int, Collaborateurs>
     */
    #[ORM\ManyToMany(targetEntity: Collaborateurs::class, inversedBy: 'IdFormations')]
    private Collection $IdCollaborateurs;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $debutValidite = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $finValidite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $attestation = null;

    public function __construct()
    {
        $this->IdCollaborateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreFormation(): ?string
    {
        return $this->titreFormation;
    }

    public function setTitreFormation(?string $titreFormation): static
    {
        $this->titreFormation = $titreFormation;

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


    /**
     * @return Collection<int, Collaborateurs>
     */
    public function getIdCollaborateurs(): Collection
    {
        return $this->IdCollaborateurs;
    }

    public function addIdCollaborateur(Collaborateurs $idCollaborateur): static
    {
        if (!$this->IdCollaborateurs->contains($idCollaborateur)) {
            $this->IdCollaborateurs->add($idCollaborateur);
        }

        return $this;
    }

    public function removeIdCollaborateur(Collaborateurs $idCollaborateur): static
    {
        $this->IdCollaborateurs->removeElement($idCollaborateur);

        return $this;
    }

    public function getDebutValidite(): ?\DateTimeInterface
    {
        return $this->debutValidite;
    }

    public function setDebutValidite(?\DateTimeInterface $debutValidite): static
    {
        $this->debutValidite = $debutValidite;

        return $this;
    }

    public function getFinValidite(): ?\DateTimeInterface
    {
        return $this->finValidite;
    }

    public function setFinValidite(?\DateTimeInterface $finValidite): static
    {
        $this->finValidite = $finValidite;

        return $this;
    }

    public function getAttestation(): ?string
    {
        return $this->attestation;
    }

    public function setAttestation(?string $attestation): static
    {
        $this->attestation = $attestation;

        return $this;
    }
}
