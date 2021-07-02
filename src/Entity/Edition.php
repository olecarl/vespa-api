<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EditionRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Dto\EditionResponse;

/**
 * @ApiResource(
 *      output=EditionResponse::class
 * )
 * @ORM\Entity(repositoryClass=EditionRepository::class)
 * @ORM\Table(name="vespa_edition")
 */
class Edition
{


    # <editor-fold desc="Variables">


    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Model $model
     *
     * @ORM\ManyToOne(targetEntity=Model::class, inversedBy="editions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

    /**
     * @var string $title
     *
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $title;

    /**
     * @var Collection $productions
     *
     * @ORM\OneToMany(targetEntity=Production::class, mappedBy="edition", orphanRemoval=true)
     */
    private $productions;

    /**
     * @var integer $buildFrom
     *
     * @Assert\Type("integer")
     * @Assert\Range(min=1940, max=2000)
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $buildFrom;

    /**
     * @var integer $buildTo
     *
     * @Assert\Type("integer")
     * @Assert\Range(min=1940, max=2000)
     * @Assert\Expression("value >= this.getBuildFrom()")
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $buildTo;

    /**
     * @var integer $quantity
     * @Assert\Type("integer")
     * @Assert\Positive()
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class)
     */
    private $type;

    # </editor-fold>

    /**
     * Edition constructor.
     */
    public function __construct()
    {
        $this->productions = new ArrayCollection();
    }

    /**
     * Returns a string representation
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->getTitle();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Production[]
     */
    public function getProductions(): Collection
    {
        return $this->productions;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getBuildFrom(): ?int
    {
        return $this->buildFrom;
    }

    public function setBuildFrom(?int $buildFrom): self
    {
        $this->buildFrom = $buildFrom;

        return $this;
    }

    public function getBuildTo(): ?int
    {
        return $this->buildTo;
    }

    public function setBuildTo(?int $buildTo): self
    {
        $this->buildTo = $buildTo;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }
}
