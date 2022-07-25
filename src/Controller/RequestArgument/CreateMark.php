<?php

declare(strict_types=1);

namespace App\Controller\RequestArgument;

use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

#[JMS\ExclusionPolicy(JMS\ExclusionPolicy::ALL)]
class CreateMark
{
    #[JMS\Expose]
    #[JMS\Type("float")]
    #[Assert\NotNull(message: "The value is required")]
    private float $latitude;

    #[JMS\Expose]
    #[JMS\Type("float")]
    #[Assert\NotNull(message: "The value is required")]
    private float $longitude;

    #[JMS\Expose]
    #[JMS\Type("string")]
    private string $comment;

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getComment(): string
    {
        return $this->comment;
    }
}
