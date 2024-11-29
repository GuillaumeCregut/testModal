<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Assert\Positive()]
    #[Groups("default")]
    private ?float $price = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Assert\PositiveOrZero()]
    #[Assert\LessThanOrEqual(100)]
    #[Groups("default")]
    private ?float $tva = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups("default")]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero()]
    private ?float $purchasePrice = 0;

    #[ORM\Column(length: 255)]
    #[Groups("default")]
    private ?string $designation = null;

    /**
     * @var Collection<int, QuotationLine>
     */

    public function __construct()
    {
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(float $tva): static
    {
        $this->tva = $tva;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPurchasePrice(): ?float
    {
        return $this->purchasePrice;
    }

    public function setPurchasePrice(float $purchasePrice): static
    {
        $this->purchasePrice = $purchasePrice;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): static
    {
        $this->designation = $designation;

        return $this;
    }


   
   

}
