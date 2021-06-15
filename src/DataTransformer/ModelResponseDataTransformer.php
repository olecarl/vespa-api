<?php


namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\ModelResponse;
use App\Entity\Model;

/**
 * Class ModelResponseDataTransformer
 *
 * @package App\DataTransformer
 */
final class ModelResponseDataTransformer implements DataTransformerInterface
{

    /**
     * {@inheritdoc}
     */
    public function transform($object, string $to, array $context = [])
    {
        $responseObject = new ModelResponse();
        /** @var Model $object */
        $responseObject->type = $object->getType();
        $responseObject->title = $object->getTitle();
        $responseObject->buildFrom = $object->getBuildFrom();
        $responseObject->buildTo = $object->getBuildTo();
        $responseObject->quantity = $object->getQuantity();

        return $responseObject;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return ModelResponse::class === $to && $data instanceof Model;
    }

}