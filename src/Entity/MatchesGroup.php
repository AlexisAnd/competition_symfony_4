<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchesGroupRepository")
 */
class MatchesGroup
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $team1;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $team2;

    /**
     * @ORM\Column(type="integer", nullable= true)
     */
    private $scoreTeam1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $scoreTeam2;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $section;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competition", inversedBy="match")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competition;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $dueDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $played;

    public function __construct()
    {
        $this->played = false;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTeam1()
    {
        return $this->team1;
    }

    /**
     * @param mixed $team1
     */
    public function setTeam1($team1): void
    {
        $this->team1 = $team1;
    }

    /**
     * @return mixed
     */
    public function getTeam2()
    {
        return $this->team2;
    }

    /**
     * @param mixed $team2
     */
    public function setTeam2($team2): void
    {
        $this->team2 = $team2;
    }

    /**
     * @return mixed
     */
    public function getScoreTeam1()
    {
        return $this->scoreTeam1;
    }

    /**
     * @param mixed $scoreTeam1
     */
    public function setScoreTeam1($scoreTeam1): void
    {
        $this->scoreTeam1 = $scoreTeam1;
    }

    /**
     * @return mixed
     */
    public function getScoreTeam2()
    {
        return $this->scoreTeam2;
    }

    /**
     * @param mixed $scoreTeam2
     */
    public function setScoreTeam2($scoreTeam2): void
    {
        $this->scoreTeam2 = $scoreTeam2;
    }

    /**
     * @return mixed
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param mixed $section
     */
    public function setSection($section): void
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

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return mixed
     */
    public function getPlayed()
    {
        return $this->played;
    }

    /**
     * @param mixed $played
     */
    public function setPlayed($played): void
    {
        $this->played = $played;
    }




}
