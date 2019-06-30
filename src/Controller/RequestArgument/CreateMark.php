<?php

declare(strict_types=1);

namespace App\Controller\RequestArgument;

use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @JMS\ExclusionPolicy("all")
 *
 * @author Anton Kovalenko <CaribbeanLegend@mail.ru>
 */
class CreateMark
{
    /**
     * @JMS\Expose()
     * @JMS\Type("float")
     * @Assert\NotNull(message="The value is required")
     */
    private $latitude;

    /**
     * @JMS\Expose()
     * @JMS\Type("float")
     * @Assert\NotNull(message="The value is required")
     */
    private $longitude;

    /**
     * @JMS\Expose()
     * @JMS\Type("string")
     */
    private $comment;

    /**
     * Получить широту, на которой установлена метка
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Получить долготу, на которой установлена метка
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Получить комментарий к метке
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }
}
