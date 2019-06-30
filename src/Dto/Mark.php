<?php

namespace App\Dto;

use DateTime;

/**
 * DTO метки на карте
 *
 * @package App\Dto
 *
 * @author Anton Kovalenko <CaribbeanLegend@mail.ru>
 */
class Mark
{
    private $id;
    private $latitude;
    private $longitude;
    private $comment;
    private $publicationDate;
    private $updatingDate;

    public function __construct(string $id, string $latitude, string $longitude, string $comment, DateTime $publicationDate, DateTime $updatingDate)
    {
        $this->id              = $id;
        $this->latitude        = $latitude;
        $this->longitude       = $longitude;
        $this->comment         = $comment;
        $this->publicationDate = $publicationDate;
        $this->updatingDate    = $updatingDate;
    }
}
