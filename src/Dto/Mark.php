<?php

namespace App\Dto;

use DateTimeImmutable;

class Mark
{
    public string $id;
    public string $latitude;
    public string $longitude;
    public string $comment;
    public ?DateTimeImmutable $publicationDate;
    public ?DateTimeImmutable $updatingDate;

    public function __construct(string $id, string $latitude, string $longitude, string $comment,
        DateTimeImmutable $publicationDate = null, DateTimeImmutable $updatingDate = null)
    {
        $this->id = $id;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->comment = $comment;
        $this->publicationDate = $publicationDate;
        $this->updatingDate = $updatingDate;
    }
}
