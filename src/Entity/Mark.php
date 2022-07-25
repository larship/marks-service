<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: "App\Repository\Mark")]
class Mark
{
    #[ORM\Id]
    #[ORM\Column(type: "uuid", unique: true, options: ["comment" => "Идентификатор метки"])]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class: "Ramsey\Uuid\Doctrine\UuidGenerator")]
    private string $id;

    #[ORM\Column(type: "decimal", precision: 9, scale: 6, options: ["comment" => "Широта, на которой установлена метка"])]
    private string $latitude;

    #[ORM\Column(type: "decimal", precision: 9, scale: 6, options: ["comment" => "Долгота, на которой установлена метка"])]
    private string $longitude;

    #[ORM\Column(type: "text", options: ["comment" => "Комментарий, оставленный к метке"])]
    private string $comment;

    #[ORM\Column(type: "datetime", options: ["comment" => "Дата публикации метки"])]
    private DateTimeImmutable $publicationDate;

    #[ORM\Column(type: "datetime", options: ["comment" => "Дата обновления метки"])]
    private DateTimeImmutable $updatingDate;

    public function getId(): string
    {
        return $this->id;
    }

    public function getLatitude(): string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLongitude(): string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    public function getPublicationDate(): DateTimeImmutable
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(DateTimeImmutable $publicationDate): void
    {
        $this->publicationDate = $publicationDate;
    }

    public function getUpdatignDate(): DateTimeImmutable
    {
        return $this->updatingDate;
    }

    public function setUpdatingDate(DateTimeImmutable $updatingDate): void
    {
        $this->updatingDate = $updatingDate;
    }
}
