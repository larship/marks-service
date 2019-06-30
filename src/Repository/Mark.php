<?php

namespace App\Repository;

use App\Entity\Mark as MarkEntity;
use App\Dto\Mark as MarkDto;
use Doctrine\DBAL\Connection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Репозиторий срочных сообщений
 *
 * @package App\Repository
 *
 * @author Anton Kovalenko <17798@7733.ru>
 */
class Mark extends ServiceEntityRepository
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(RegistryInterface $registry, Connection $connection)
    {
        $this->connection = $connection;

        parent::__construct($registry, MarkEntity::class);
    }

    /**
     * Получить список всех меток
     *
     * @return Mark[]
     */
    public function findAll(): array
    {
        return $this->createQueryBuilder('m')
            ->select('NEW App\Dto\Mark(m.id, m.latitude, m.longitude, m.comment, m.publicationDate, m.updatingDate)')
            ->getQuery()
            ->getResult()
            ;
    }
}
