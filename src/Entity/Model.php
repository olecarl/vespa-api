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
     * @ORM\Column(type="string", length=32, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(min="2", max="32")
     */
    private $title;


    # </editor-fold>

    # <editor-fold desc="Constructor">

    /**
     * Model constructor.
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    # </editor-fold>

    # <editor-fold desc="Getter/Setter">

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getTitle();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }



    # </editor-fold>
}
