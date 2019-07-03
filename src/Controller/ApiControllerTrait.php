<?php

namespace App\Controller;

use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Трэйт для работы с АПИ
 *
 * @author Anton Kovalenko <CaribbeanLegend@mail.ru>
 */
trait ApiControllerTrait
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * Производит сериализацию и возвращает JSON-ответ.
     *
     * @param mixed $data Объект для сериализации
     *
     * @return JsonResponse
     */
    public function jsonResponse($data)
    {
        return new JsonResponse($this->serializer->serialize($data, 'json'), 200, [], true);
    }
}
