<?php

namespace App\Entity;

use App\Repository\ProductionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProductionRepository::class)
 * @ORM\Table("vespa_production")
 */
class Production
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Edition::class, inversedBy="productions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $edition;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Range(min=1950, max=1999)
     */
    private $year;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min=1, max=999999)
     */
    private $serialFrom;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min=1, max=999999)
     * @Assert\Expression("value > this.getSerialFrom()")
     */
    private $serialTo;

    /**
     * @ORM\Column(type="integer", options={"default": 0})
     * @Assert\Positive()
     */
    private $quantity;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEdition(): ?Edition
    {
        return $this->edition;
    }

    public function setEdition(Edition $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getSerialFrom(): ?int
    {
        return $this->serialFrom;
    }

    public function setSerialFrom(int $serialFrom): self
    {
        $this->serialFrom = $serialFrom;

        return $this;
    }

    public function getSerialTo(): ?int
    {
        return $this->serialTo;
    }

    public function setSerialTo(int $serialTo): self
    {
        $this->serialTo = $serialTo;
        $this->setQuantity($this->serialTo - $this->serialFrom);
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
