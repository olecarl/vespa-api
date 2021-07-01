<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ModelRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints as Assert;
use App\Dto\ModelResponse;

/**
 * @ApiResource(
 *     attributes={"security"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *         "get",
 *         "post"={"security"="is_granted('ROLE_ADMIN')"}
 *     },
 *     itemOperations={
 *         "get",
 *         "put"={"security"="is_granted('ROLE_ADMIN')"},
 *         "patch"={"security"="is_granted('ROLE_ADMIN')"},
 *         "delete"={"security"="is_granted('ROLE_ADMIN')"}
 *     },
 *     output=ModelResponse::class
 * )
 *
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
     * @ORM\Column(type="date")
     */
    private $buildFrom;

    /**
     * @ORM\Column(type="date")
     */
    private $buildTo;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type("integer")
     * @Assert\GreaterThan(1)
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

    public function getBuildFrom(): ?DateTimeInterface
    {
        return $this->buildFrom;
    }

    public function setBuildFrom(DateTimeInterface $buildFrom): self
    {
        $this->buildFrom = $buildFrom;

        return $this;
    }

    public function getBuildTo(): ?DateTimeInterface
    {
        return $this->buildTo;
    }

    public function setBuildTo(DateTimeInterface $buildTo): self
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
