<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 * @ORM\Table(name="vespa_type")
 */
class Type
{
    /**
     * @var string $id
     *
     * @ORM\Id()
     * @ORM\Column(type="string", unique=true)
     * @Assert\NotBlank()
     * @Assert\Length(min="5", max="6")
     **/
    private $id;

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getId();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Type $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }
}
