<?php


namespace App\Dto;

use \DateTime;

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

    /** @var DateTime $buildFrom */
    public $buildFrom;

    /** @var DateTime $buildFrom */
    public $buildTo;

    /** @var integer $quantity */
    public $quantity;

}
