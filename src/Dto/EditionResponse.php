<?php


namespace App\Dto;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class EditionResponse
 *
 * @package App\Dto
 */
final class EditionResponse
{

    /** @var string $brand */
    public $brand;

    /** @var string $category */
    public $category;

    /** @var string $model */
    public $model;

    /** @var string $type */
    public $type;

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
