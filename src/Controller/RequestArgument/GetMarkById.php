<?php

declare(strict_types=1);

namespace App\Controller\RequestArgument;

use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
class GetMarkById
{
    #[JMS\Expose]
    #[JMS\Type("string")]
    #[Assert\NotNull(message: "The value is required")]
    private string $id;

    public function getId(): string
    {
        return $this->id;
    }
}
