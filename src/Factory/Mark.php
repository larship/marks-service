<?php

namespace App\Factory;

use DateTimeImmutable;
use App\Entity\Mark as MarkEntity;
use App\DTO\Mark as MarkDTO;

class Mark
{
    public function createEntityFromDTO(MarkDTO $markDto): MarkEntity
    {
        $mark = new MarkEntity();
        $mark->setLatitude($markDto->latitude);
        $mark->setLongitude($markDto->longitude);
        $mark->setComment($markDto->comment);
        $mark->setPublicationDate(new DateTimeImmutable());
        $mark->setUpdatingDate(new DateTimeImmutable());

        return $mark;
    }

    public function createDTO(string $id, string $latitude, string $longitude, string $comment,
        ?DateTimeImmutable $publicationDate = null, ?DateTimeImmutable $updatingDate = null): MarkDTO
    {
        return new MarkDto(
            $id,
            $latitude,
            $longitude,
            $comment,
            $publicationDate,
            $updatingDate
        );
    }

    public function createDTOFromEntity(MarkEntity $markEntity): MarkDTO
    {
        return new MarkDto(
            $markEntity->getId(),
            $markEntity->getLatitude(),
            $markEntity->getLongitude(),
            $markEntity->getComment(),
            $markEntity->getPublicationDate(),
            $markEntity->getUpdatignDate()
        );
    }
}
