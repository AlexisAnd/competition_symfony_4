<?php

namespace App\DataFixtures;

use App\Entity\Competition;
use App\Entity\CompetitionTeams;
use App\Entity\Teams;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private const POST_TEAMS = [
        ['name'=> 'Allemagne'],
        ['name'=> 'Angleterre'],
        ['name'=> 'Belgique'],
        ['name'=> 'Croatie'],
        ['name'=> 'Danemark'],
        ['name'=> 'Espagne'],
        ['name'=> 'France'],
        ['name'=> 'Islande'],
        ['name'=> 'Pologne'],
        ['name'=> 'Portugal'],
        ['name'=> 'Russie'],
        ['name'=> 'Serbie'],
        ['name'=> 'Suede'],
        ['name'=> 'Suisse'],
        ['name'=> 'Egypte'],
        ['name'=> 'Maroc'],
        ['name'=> 'Nigeria'],
        ['name'=> 'Senegal'],
        ['name'=> 'Tunisie'],
        ['name'=> 'Argentine'],
        ['name'=> 'Brésil'],
        ['name'=> 'Colombie'],
        ['name'=> 'Uruguay'],
        ['name'=> 'Pérou'],
        ['name'=> 'Arabie Saoudite'],
        ['name'=> 'Australie'],
        ['name'=> 'Corée du Sud'],
        ['name'=> 'Iran'],
        ['name'=> 'Japon'],
        ['name'=> 'Costa Rica'],
        ['name'=> 'Mexique'],
        ['name'=> 'Panama']
    ];

    private const SECTION = [
        'A',
        'B',
        'C',
        'D',
        'E',
        'F',
        'G',
        'H',

    ];

    private const MAX = 4;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadTeams($manager);
        $this->loadUsers($manager);
        $this->loadCompetition($manager);
    }

    public function loadCompetition(ObjectManager $manager)
    {

        $competition = new Competition();
        $competition->setName('World Cup Essens');
        $competition->setCreatedOn(new \DateTime('2018-05-20'));
        $competition->setUser($this->getReference('monark'));
        $this->addReference('World Cup Essens', $competition);
        $manager->persist($competition);
        $manager->flush();

    }

    public function loadUsers(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('Alexis');
        $user->setLastname('Andrieu');
        $user->setEmail('email@email.com');
        $user->setUsername('monark');
        $user->setPassword($this->passwordEncoder->encodePassword($user, '00000000'));

        $this->addReference('monark', $user);
        $manager->persist($user);
        $manager->flush();

    }

    public function loadTeams(ObjectManager $manager)
    {
        foreach (self::POST_TEAMS as $data)
        {
            $teams = new Teams();
            $teams->setName($data['name']);
            $this->addReference($data['name'], $teams);
            $manager->persist($teams);
            $manager->flush();
        }


    }


}
