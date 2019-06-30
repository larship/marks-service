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
class UpdateMark extends CreateMark
{
    /**
     * @JMS\Expose()
     * @JMS\Type("string")
     * @Assert\NotNull(message="The value is required")
     */
    private $id;

    /**
     * Получить идентификатор метки
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
