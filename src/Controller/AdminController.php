<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 12/12/2018
 * Time: 17:01
 */

namespace App\Controller;


use App\Entity\Competition;
use App\Entity\CompetitionTeams;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminController extends AbstractController
{

    /**
     * @Route("/admin", name="admin_index")
     *
     */
    public function admin_Index()
    {

        $doctrine = $this->getDoctrine();

        $competition = $doctrine->getRepository(Competition::class)->findOneBy([
            'user'=>$this->getUser(),
            'completed_on'=> null,

        ]);

        dump($competition);
        $groupATeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupA($competition);
        $groupBTeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupB($competition);
        $groupCTeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupC($competition);
        $groupDTeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupD($competition);
        $groupETeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupE($competition);
        $groupFTeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupF($competition);
        $groupGTeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupG($competition);
        $groupHTeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupH($competition);



        return $this->render('admin/admin_main_page.html.twig',['competition'=>$competition, 'teamsGroupA'=>$groupATeams,
            'teamsGroupB'=>$groupBTeams, 'teamsGroupC'=>$groupCTeams, 'teamsGroupD'=>$groupDTeams, 'teamsGroupE'=>$groupETeams,
            'teamsGroupF'=>$groupFTeams, 'teamsGroupG'=>$groupGTeams, 'teamsGroupH'=>$groupHTeams]);
    }

}