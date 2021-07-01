<?php


namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\ModelResponse;
use App\Entity\Model;
use ApiPlatform\Core\Validator\ValidatorInterface;

/**
 * Class ModelResponseDataTransformer
 *
 * @package App\DataTransformer
 */
final class ModelResponseDataTransformer implements DataTransformerInterface
{
    private $validator;

    /**
     * ModelResponseDataTransformer constructor.
     *
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }


    /**
     * {@inheritdoc}
     */
    public function transform($object, string $to, array $context = [])
    {
        /** @var Model $object */
        $this->validator->validate($object);

        $responseObject = new ModelResponse();
        $responseObject->brand = ucfirst(ModelResponse::DEFAULT_BRAND);
        $responseObject->category = ucfirst(ModelResponse::DEFAULT_CATEGORY);
        $responseObject->title = $object->getTitle();

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
