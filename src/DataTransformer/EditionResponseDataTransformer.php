<?php


namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\EditionResponse;
use App\Dto\ModelResponse;
use App\Entity\Edition;
use App\Entity\Model;
use ApiPlatform\Core\Validator\ValidatorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class EditionResponseDataTransformer
 *
 * @package App\DataTransformer
 */
final class EditionResponseDataTransformer implements DataTransformerInterface
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
        /** @var Edition $object */
        $this->validator->validate($object);

        $responseObject = new EditionResponse();
        $responseObject->brand = ucfirst(ModelResponse::DEFAULT_BRAND);
        $responseObject->category = ucfirst(ModelResponse::DEFAULT_CATEGORY);
        $responseObject->model = $object->getModel()->getTitle();
        $responseObject->type = strval($object->getType()->getId());
        $responseObject->title = $object->getTitle();
        $responseObject->buildFrom = $object->getProductions()->first()->getYear();
        $responseObject->buildTo = $object->getProductions()->last()->getYear();
        $responseObject->quantity = $this->calculateQuantity($object->getProductions());

        return $responseObject;
    }

    /**
     * @param Collection $productions
     *
     * @return integer
     */
    private function calculateQuantity(Collection $productions) {
        $total = 0;
        foreach ($productions as $production) {
            $total = $total + (intval($production->getSerialTo()) -
                            intval($production->getSerialFrom())
                    );
        }

        return $total;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return EditionResponse::class === $to && $data instanceof Edition;
    }
}
