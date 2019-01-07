<?php

namespace App\Repository;

use App\Entity\Competition;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Validator\Constraints\Count;

/**
 * @method Competition|null find($id, $lockMode = null, $lockVersion = null)
 * @method Competition|null findOneBy(array $criteria, array $orderBy = null)
 * @method Competition[]    findAll()
 * @method Competition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetitionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Competition::class);
    }

    public function findAllWhereGroupsNotCreated(User $user)
    {
        $qb = $this->createQueryBuilder('c');

        return $qb->where('c.user= :user')
            ->andWhere('c.groupscreated=0')
            ->andWhere('c.completed_on is Null')
            ->setParameters([
                'user'=> $user
            ])
            ->getQuery()
            ->getResult();

    }

    public function findCompetitionFull($competition)
    {
        $qb = $this->createQueryBuilder('c');

        return $qb
            ->innerJoin('c.teams', 't')
            ->addSelect('count(t.team)')
            ->where('c.id= :id')
            ->andWhere('c.groupscreated=0')

            ->setParameters([
                'id'=> $competition
            ])
            ->getQuery()
            ->getOneOrNullResult();

    }

    public function findId($user)
    {
        $qb = $this->createQueryBuilder('c');

        return $qb->select('c.id')
            ->where('c.groupscreated= :group')
            ->andWhere('c.completed_on= :completed')
            ->andWhere('c.user= :user')
            ->setParameters([
                'group'=> true,
                'completed'=> null,
                'user'=>$user
            ])
            ->getQuery()
            ->getResult();

    }


}
