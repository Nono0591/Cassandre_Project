<?php

namespace App\Entity;

use App\Repository\AuditRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuditRepository::class)]
class Audit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $DateIntervention = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = null;

    #[ORM\Column(length: 50)]
    private ?string $referenceMission = null;

    #[ORM\Column(length: 50)]
    private ?string $perimétreDeclaré = null;

    #[ORM\Column(length: 255)]
    private ?string $rapport = null;

    #[ORM\Column(length: 50)]
    private ?string $durée = null;

    #[ORM\ManyToOne(inversedBy: 'Audit')]
    private ?Client $client = null;

    #[ORM\OneToOne(inversedBy: 'audit', cascade: ['persist', 'remove'])]
    private ?Facture $facture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateIntervention(): ?\DateTime
    {
        return $this->DateIntervention;
    }

    public function setDateIntervention(\DateTime $DateIntervention): static
    {
        $this->DateIntervention = $DateIntervention;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getReferenceMission(): ?string
    {
        return $this->referenceMission;
    }

    public function setReferenceMission(string $referenceMission): static
    {
        $this->referenceMission = $referenceMission;

        return $this;
    }

    public function getPerimétreDeclaré(): ?string
    {
        return $this->perimétreDeclaré;
    }

    public function setPerimétreDeclaré(string $perimétreDeclaré): static
    {
        $this->perimétreDeclaré = $perimétreDeclaré;

        return $this;
    }

    public function getRapport(): ?string
    {
        return $this->rapport;
    }

    public function setRapport(string $rapport): static
    {
        $this->rapport = $rapport;

        return $this;
    }

    public function getDurée(): ?string
    {
        return $this->durée;
    }

    public function setDurée(string $durée): static
    {
        $this->durée = $durée;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): static
    {
        $this->facture = $facture;

        return $this;
    }
}
