<?php

namespace App\Repository;

use App\Entity\Teams;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Teams|null find($id, $lockMode = null, $lockVersion = null)
 * @method Teams|null findOneBy(array $criteria, array $orderBy = null)
 * @method Teams[]    findAll()
 * @method Teams[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Teams::class);
    }

    public function findTeam($id)
    {
        $qb = $this->createQueryBuilder('t');

        return $qb->select('t.id')
            ->Where('t.id= :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
