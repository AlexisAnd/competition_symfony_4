<?php

namespace App\Repository;

use App\Entity\Competition;
use App\Entity\MatchesGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MatchesGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatchesGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatchesGroup[]    findAll()
 * @method MatchesGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatchesGroupRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MatchesGroup::class);
    }

    public function findTotal(Competition $competition)
    {
        $qb =$this->createQueryBuilder('g');

        return $qb->select('count(g)')
            ->where('g.competition= :competition')
            ->andWhere('g.section= :section')
            ->setParameters([
                'competition'=>$competition,
                'section'=> 'A'
            ])
            ->getQuery()
            ->getSingleScalarResult();

    }
}
