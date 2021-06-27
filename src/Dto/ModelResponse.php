<?php


namespace App\Dto;


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

    /** @var int $buildFrom */
    public $buildFrom;

    /** @var int $buildTo */
    public $buildTo;

    /** @var string $quantity */
    public $quantity;

}
