<?php

namespace App\Repository;

use App\Entity\Competition;

use App\Entity\CompetitionTeams;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CompetitionTeams|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompetitionTeams|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompetitionTeams[]    findAll()
 * @method CompetitionTeams[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetitionTeamsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CompetitionTeams::class);
    }

    public function findGroup($competition, $group)
    {
        $qb = $this->createQueryBuilder('t');

        return $qb->select('count(t)')
            ->Where('t.section= :section')
            ->andWhere('t.competition= :competition')
            ->setParameters([
                'section'=>$group,
                'competition'=> $competition
            ])
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findTeamsGroupA($competition)
    {
        $qb = $this->createQueryBuilder('t');

        return $qb
            ->Where('t.section= :section')
            ->andWhere('t.competition= :competition')
            ->setParameters([
                'section'=>'A',
                'competition'=> $competition
            ])
            ->getQuery()
            ->getResult();
    }

    public function findTeamsGroupB($competition)
    {
        $qb = $this->createQueryBuilder('t');

        return $qb
            ->Where('t.section= :section')
            ->andWhere('t.competition= :competition')
            ->setParameters([
                'section' => 'B',
                'competition' => $competition
            ])
            ->getQuery()
            ->getResult();
    }

    public function findTeamsGroupC($competition)
    {
        $qb = $this->createQueryBuilder('t');

        return $qb
            ->Where('t.section= :section')
            ->andWhere('t.competition= :competition')
            ->setParameters([
                'section' => 'C',
                'competition' => $competition
            ])
            ->getQuery()
            ->getResult();
    }

    public function findTeamsGroupD($competition)
    {
        $qb = $this->createQueryBuilder('t');

        return $qb
            ->Where('t.section= :section')
            ->andWhere('t.competition= :competition')
            ->setParameters([
                'section' => 'D',
                'competition' => $competition
            ])
            ->getQuery()
            ->getResult();
    }

    public function findTeamsGroupE($competition)
    {
        $qb = $this->createQueryBuilder('t');

        return $qb
            ->Where('t.section= :section')
            ->andWhere('t.competition= :competition')
            ->setParameters([
                'section' => 'E',
                'competition' => $competition
            ])
            ->getQuery()
            ->getResult();
    }

    public function findTeamsGroupF($competition)
    {
        $qb = $this->createQueryBuilder('t');

        return $qb
            ->Where('t.section= :section')
            ->andWhere('t.competition= :competition')
            ->setParameters([
                'section' => 'F',
                'competition' => $competition
            ])
            ->getQuery()
            ->getResult();
    }

    public function findTeamsGroupG($competition)
    {
        $qb = $this->createQueryBuilder('t');

        return $qb
            ->Where('t.section= :section')
            ->andWhere('t.competition= :competition')
            ->setParameters([
                'section' => 'G',
                'competition' => $competition
            ])
            ->getQuery()
            ->getResult();
    }

    public function findTeamsGroupH($competition)
    {
        $qb = $this->createQueryBuilder('t');

        return $qb
            ->Where('t.section= :section')
            ->andWhere('t.competition= :competition')
            ->setParameters([
                'section' => 'H',
                'competition' => $competition
            ])
            ->getQuery()
            ->getResult();
    }

    public function findTeam($team1)
    {
        $qb = $this->createQueryBuilder('c');

        return $qb->select('c.team')
            ->where('c.team= :team')
            ->setParameter('team', $team1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findTeamByName($competition, $team)
    {

        $qb = $this->createQueryBuilder('c');

        return $qb->select('c.team')
            ->where('c.competition= :competition')
            ->andWhere('c.team= :team')
            ->setParameters([
                'competition'=> $competition,
                'team'=> $team
            ])
            ->getQuery()
            ->getOneOrNullResult();

    }

}
