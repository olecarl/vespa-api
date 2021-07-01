<?php


namespace App\Dto;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ModelResponse
 *
 * @package App\Dto
 */
final class ModelResponse
{

    const DEFAULT_BRAND = "vespa";
    const DEFAULT_CATEGORY = "smallframe";

    /** @var string $brand */
    public $brand;

    /** @var string $category */
    public $category;

    /** @var string $title */
    public $title;

    /** @var string $imageUrl */
    public $imageUrl;

    /** @var integer $buildFrom */
    public $buildFrom;

    /** @var integer $buildTo */
    public $buildTo;

    /** @var integer $quantity */
    public $quantity;

}
