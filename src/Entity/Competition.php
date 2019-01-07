<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetitionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Competition
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_on;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $completed_on;

    /**
     * @ORM\Column(type="boolean")
     */
    private $groupscreated;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="competitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CompetitionTeams", mappedBy="competition")
     */
    private $teams;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MatchesGroup", mappedBy="competition")
     */
    private $match;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Invitation", mappedBy="competition")
     */
    private $invitation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Player", mappedBy="competition")
     */
    private $player;

    public function __construct()
    {
        $this->groupscreated = false;
        $this->teams = new ArrayCollection();
        $this->match = new ArrayCollection();
        $this->invitation = new ArrayCollection();
        $this->player = new ArrayCollection();

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCreatedOn()
    {
        return $this->created_on;
    }

    /**
     * @param mixed $created_on
     */
    public function setCreatedOn($created_on): void
    {
        $this->created_on = $created_on;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setTimeOnPersist()
    {
        $this->created_on = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getCompletedOn()
    {
        return $this->completed_on;
    }

    /**
     * @param mixed $completed_on
     */
    public function setCompletedOn($completed_on): void
    {
        $this->completed_on = $completed_on;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getGroupscreated()
    {
        return $this->groupscreated;
    }

    /**
     * @param mixed $groupscreated
     */
    public function setGroupscreated($groupscreated): void
    {
        $this->groupscreated = $groupscreated;
    }

    /**
     * @return mixed
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @return mixed
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * @return mixed
     */
    public function getInvitation()
    {
        return $this->invitation;
    }

    /**
     * @return mixed
     */
    public function getPlayer()
    {
        return $this->player;
    }

















}
