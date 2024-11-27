<?php

namespace App\Entity;

use App\Repository\QuotationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuotationRepository::class)]
class Quotation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $quotationId = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $quotationDate = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $validity = null;

    #[ORM\Column]
    private ?int $state = null;

    /**
     * @var Collection<int, QuotationLine>
     */
    #[ORM\OneToMany(targetEntity: QuotationLine::class, mappedBy: 'quotation')]
    private Collection $quotationLines;

    public function __construct()
    {
        $this->quotationLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuotationId(): ?string
    {
        return $this->quotationId;
    }

    public function setQuotationId(string $quotationId): static
    {
        $this->quotationId = $quotationId;

        return $this;
    }

    public function getQuotationDate(): ?\DateTimeImmutable
    {
        return $this->quotationDate;
    }

    public function setQuotationDate(\DateTimeImmutable $quotationDate): static
    {
        $this->quotationDate = $quotationDate;

        return $this;
    }

    public function getValidity(): ?\DateTimeImmutable
    {
        return $this->validity;
    }

    public function setValidity(\DateTimeImmutable $validity): static
    {
        $this->validity = $validity;

        return $this;
    }

    public function getState(): ?int
    {
        return $this->state;
    }

    public function setState(int $state): static
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return Collection<int, QuotationLine>
     */
    public function getQuotationLines(): Collection
    {
        return $this->quotationLines;
    }

    public function addQuotationLine(QuotationLine $quotationLine): static
    {
        if (!$this->quotationLines->contains($quotationLine)) {
            $this->quotationLines->add($quotationLine);
            $quotationLine->setQuotation($this);
        }

        return $this;
    }

    public function removeQuotationLine(QuotationLine $quotationLine): static
    {
        if ($this->quotationLines->removeElement($quotationLine)) {
            // set the owning side to null (unless already changed)
            if ($quotationLine->getQuotation() === $this) {
                $quotationLine->setQuotation(null);
            }
        }

        return $this;
    }
}
