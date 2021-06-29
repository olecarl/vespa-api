<?php


namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ModelResponse
 *
 * @package App\Dto
 */
final class ModelResponse
{


    /** @var string $brand */
    public $brand = "vespa";

    /** @var string $series */
    public $series = "smallframe";

    /** @var string $type */
    public $type;

    /** @var string $title */
    public $title;

    /**
     * @var int $buildFrom
     * @Assert\Type("integer")
     * @Assert\Range(min=1940, max=2000)
     */
    public $buildFrom;

    /**
     * @var int $buildTo
     * @Assert\Type("integer")
     * @Assert\Range(min=1940, max=2000)
     * @Assert\GreaterThan()
     */
    public $buildTo;

    /**
     * @var string $quantity
     * @Assert\Type("integer")
     * @Assert\GreaterThan(1)
     */
    public $quantity;

}
