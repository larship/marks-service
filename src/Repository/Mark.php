<?php

namespace App\Repository;

use App\Entity\Mark as MarkEntity;
use Doctrine\DBAL\Connection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class Mark extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry, Connection $connection)
    {
        parent::__construct($registry, MarkEntity::class);
    }

    /**
     * Получить список всех меток
     * @return Mark[]
     */
    public function findAll(): array
    {
        return $this->createQueryBuilder('m')
            ->select('NEW App\Dto\Mark(m.id, m.latitude, m.longitude, m.comment, m.publicationDate, m.updatingDate)')
            ->getQuery()
            ->getResult();
    }
}
