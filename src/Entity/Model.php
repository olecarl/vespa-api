<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ModelRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ModelRepository::class)
 * @ORM\Table(name="vespa_model")
 */
class Model
{


    # <editor-fold desc="Properties">


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=6, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(min="5", max="6")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=32, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(min="1", max="32")
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $buildFrom;

    /**
     * @ORM\Column(type="integer")
     */
    private $buildTo;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type("integer")
     * @Assert\Positive()
     */
    private $quantity;

    # </editor-fold>

    # <editor-fold desc="Constructor">

    /**
     * Model constructor.
     *
     * @param string $title
     * @param string $type
     */
    public function __construct(string $title, string $type)
    {
        $this->title = $title;
        $this->type = $type;
    }

    # </editor-fold>

    # <editor-fold desc="Getter/Setter">

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getTitle() . " (" . $this->getType() . ")";
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getBuildFrom(): ? int
    {
        return $this->buildFrom;
    }

    public function setBuildFrom(int $buildFrom): self
    {
        $this->buildFrom = $buildFrom;

        return $this;
    }

    public function getBuildTo(): ? int
    {
        return $this->buildTo;
    }

    public function setBuildTo(int $buildTo): self
    {
        $this->buildTo = $buildTo;

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

    # </editor-fold>
}
