<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetitionTeamsRepository")
 */
class CompetitionTeams
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     *
     */
    private $team;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $points;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $macthPlayed;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $win;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $draw;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $loss;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $goals_scored;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $goals_conceded;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $section;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competition", inversedBy="teams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competition;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param mixed $team
     */
    public function setTeam($team): void
    {
        $this->team = $team;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points): void
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getMacthPlayed()
    {
        return $this->macthPlayed;
    }

    /**
     * @param mixed $macthPlayed
     */
    public function setMacthPlayed($macthPlayed): void
    {
        $this->macthPlayed = $macthPlayed;
    }

    /**
     * @return mixed
     */
    public function getWin()
    {
        return $this->win;
    }

    /**
     * @param mixed $win
     */
    public function setWin($win): void
    {
        $this->win = $win;
    }

    /**
     * @return mixed
     */
    public function getDraw()
    {
        return $this->draw;
    }

    /**
     * @param mixed $draw
     */
    public function setDraw($draw): void
    {
        $this->draw = $draw;
    }

    /**
     * @return mixed
     */
    public function getLoss()
    {
        return $this->loss;
    }

    /**
     * @param mixed $loss
     */
    public function setLoss($loss): void
    {
        $this->loss = $loss;
    }

    /**
     * @return mixed
     */
    public function getGoalsScored()
    {
        return $this->goals_scored;
    }

    /**
     * @param mixed $goals_scored
     */
    public function setGoalsScored($goals_scored): void
    {
        $this->goals_scored = $goals_scored;
    }

    /**
     * @return mixed
     */
    public function getGoalsConceded()
    {
        return $this->goals_conceded;
    }

    /**
     * @param mixed $goals_conceded
     */
    public function setGoalsConceded($goals_conceded): void
    {
        $this->goals_conceded = $goals_conceded;
    }

    /**
     * @return mixed
     */
    public function getsection()
    {
        return $this->section;
    }

    /**
     * @param mixed $section
     */
    public function setsection($section): void
    {
        $this->section = $section;
    }

    /**
     * @return mixed
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * @param mixed $competition
     */
    public function setCompetition($competition): void
    {
        $this->competition = $competition;
    }
    public function __toString()
    {
        return $this->team;
    }




}
