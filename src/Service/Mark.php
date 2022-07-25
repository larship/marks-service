<?php

namespace App\Service;

use App\Entity\Mark as MarkEntity;
use App\Factory\Mark as MarkFactory;
use App\Repository\Mark as MarkRepository;
use App\Dto\Mark as MarkDTO;
use Doctrine\ORM\EntityManagerInterface;
use DateTimeImmutable;
use Exception;

class Mark
{
    private EntityManagerInterface $entityManager;

    private MarkRepository $markRepository;

    private MarkFactory $markFactory;

    public function __construct(EntityManagerInterface $entityManager, MarkRepository $markRepository, MarkFactory $markFactory)
    {
        $this->entityManager = $entityManager;
        $this->markRepository = $markRepository;
        $this->markFactory = $markFactory;
    }

    public function saveMark(MarkDTO $markDto): void
    {
        $mark = $this->markFactory->createEntityFromDTO($markDto);

        $this->entityManager->persist($mark);
        $this->entityManager->flush();
    }

    public function findMark(string $id): ?MarkDTO
    {
        $mark = $this->$this->markRepository->find($id);

        if (empty($mark)) {
            return null;
        }

        return $this->markFactory->createDTOFromEntity($mark);
    }

    public function findAll(): array
    {
        $marks = $this->$this->markRepository->findAll();

        return array_map(function (MarkEntity $markEntity) {
            return $this->markFactory->createDTOFromEntity($markEntity);
        }, $marks);
    }

    public function updateMark(MarkDTO $markDto): void
    {
        if (null === $mark = $this->$this->markRepository->find($markDto->id)) {
            throw new \Exception('Can\'t find mark with uid="' . id . '"');
        }

        $mark->setLatitude($markDto->latitude);
        $mark->setLongitude($markDto->longitude);
        $mark->setComment($markDto->comment);
        $mark->setUpdatingDate(new \DateTimeImmutable());

        $this->entityManager->persist($mark);
        $this->entityManager->flush();
    }

    public function deleteMark(string $id): bool
    {
        $mark = $this->markRepository->find($id);

        if (!$mark) {
            return false;
        }

        $this->entityManager->remove($mark);
        $this->entityManager->flush();

        return true;
    }
}
