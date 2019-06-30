<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Mark")
 */
class Mark
{
    /**
     * Идентификатор метки
     *
     * @ORM\Id()
     * @ORM\Column(type="uuid", unique=true, options={"comment": "Идентификатор метки"})
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * Широта, на которой установлена метка
     *
     * @ORM\Column(type="decimal", precision=9, scale=6, options={"comment": "Широта, на которой установлена метка"})
     */
    private $latitude;

    /**
     * Долгота, на которой установлена метка
     *
     * @ORM\Column(type="decimal", precision=9, scale=6, options={"comment": "Долгота, на которой установлена метка"})
     */
    private $longitude;

    /**
     * Комментарий, оставленный к метке
     *
     * @ORM\Column(type="text", options={"comment": "Комментарий, оставленный к метке"})
     */
    private $comment;

    /**
     * Дата публикации метки
     *
     * @ORM\Column(type="datetime", options={"comment": "Дата публикации метки"})
     */
    private $publicationDate;

    /**
     * Дата обновления метки
     *
     * @ORM\Column(type="datetime", options={"comment": "Дата обновления метки"})
     */
    private $updatingDate;

    public function getId(): string
    {
        return $this->id;
    }

    public function getLatitude(): string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLongitude(): string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude)
    {
        $this->longitude = $longitude;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    public function getPublicationDate(): DateTime
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(DateTime $publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }

    public function getUpdatignDate(): DateTime
    {
        return $this->updatingDate;
    }

    public function setUpdatingDate(DateTime $updatingDate)
    {
        $this->updatingDate = $updatingDate;
    }
}
