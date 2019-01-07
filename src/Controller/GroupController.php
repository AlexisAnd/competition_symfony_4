<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 11/12/2018
 * Time: 11:06
 */

namespace App\Controller;


use App\Entity\Competition;
use App\Entity\CompetitionTeams;
use App\Entity\GroupA;
use App\Entity\MatchesGroup;
use App\Form\MatchesGroupType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 */
class GroupController extends AbstractController
{
    /**
     * @Route("/matches", name="matches_groups")
     */
    public function matches()
    {
        $doctrine = $this->getDoctrine();

        $competition = $doctrine->getRepository(Competition::class)->findOneBy([
            'user'=>$this->getUser(),
            'completed_on'=> null,
            'groupscreated'=> true

        ]);


        return $this->render('admin/matches.html.twig',['competition'=>$competition]);
    }

    /**
     * @Route("/all/{id}", name="group_all")
     */
    public function allGroups(Competition $competition)
    {
        $doctrine = $this->getDoctrine();

        $groupATeams = $doctrine->getRepository(CompetitionTeams::class)->findby([
            'competition'=>$competition,
            'section'=> 'A'
        ]);
        $groupBTeams = $doctrine->getRepository(CompetitionTeams::class)->findby([
            'competition'=>$competition,
            'section'=> 'B'
        ]);
        $groupCTeams = $doctrine->getRepository(CompetitionTeams::class)->findby([
            'competition'=>$competition,
            'section'=> 'C'
        ]);
        $groupDTeams = $doctrine->getRepository(CompetitionTeams::class)->findby([
            'competition'=>$competition,
            'section'=> 'D'
        ]);
        $groupETeams = $doctrine->getRepository(CompetitionTeams::class)->findby([
            'competition'=>$competition,
            'section'=> 'E'
        ]);
        $groupFTeams = $doctrine->getRepository(CompetitionTeams::class)->findby([
            'competition'=>$competition,
            'section'=> 'F'
        ]);
        $groupGTeams = $doctrine->getRepository(CompetitionTeams::class)->findby([
            'competition'=>$competition,
            'section'=> 'G'
        ]);
        $groupHTeams = $doctrine->getRepository(CompetitionTeams::class)->findby([
            'competition'=>$competition,
            'section'=> 'H'
        ]);

        $matchsA = $doctrine->getRepository(MatchesGroup::class)->findby([
            'competition'=>$competition,
            'section'=> 'A'
        ]);
        $matchsB = $doctrine->getRepository(MatchesGroup::class)->findby([
            'competition'=>$competition,
            'section'=> 'B'
        ]);
        $matchsC = $doctrine->getRepository(MatchesGroup::class)->findby([
            'competition'=>$competition,
            'section'=> 'C'
        ]);
        $matchsD = $doctrine->getRepository(MatchesGroup::class)->findby([
            'competition'=>$competition,
            'section'=> 'D'
        ]);
        $matchsE = $doctrine->getRepository(MatchesGroup::class)->findby([
            'competition'=>$competition,
            'section'=> 'E'
        ]);
        $matchsF = $doctrine->getRepository(MatchesGroup::class)->findby([
            'competition'=>$competition,
            'section'=> 'F'
        ]);
        $matchsG = $doctrine->getRepository(MatchesGroup::class)->findby([
            'competition'=>$competition,
            'section'=> 'G'
        ]);
        $matchsH = $doctrine->getRepository(MatchesGroup::class)->findby([
            'competition'=>$competition,
            'section'=> 'H'
        ]);

        return $this->render('admin/all_groups.html.twig', ['groupA'=>$groupATeams,'groupB'=>$groupBTeams, 'groupC'=>$groupCTeams,
            'groupD'=>$groupDTeams,'groupE'=>$groupETeams,'groupF'=>$groupFTeams,'groupG'=>$groupGTeams,'groupH'=>$groupHTeams,
            'matchesA'=>$matchsA, 'matchesB'=>$matchsB, 'matchesC'=>$matchsC, 'matchesD'=>$matchsD, 'matchesE'=>$matchsE,
            'matchesF'=>$matchsF, 'matchesG'=>$matchsG, 'matchesH'=>$matchsH]);
    }

    /**
     *@Route("/create-match", name="group_create_match")
     */
    public function matchesGroup(Request $request)
    {

        $competition = $this->getDoctrine()->getRepository(Competition::class)->findOneBy([
            'user'=>$this->getUser(),
            'completed_on'=> null
        ]);

        $id = $competition->getId();
        $match= new MatchesGroup();
        $match->setCompetition($competition);
        $form = $this->createForm(
            MatchesGroupType::class,
            $match
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($match);
            $em->flush();

            return $this->redirectToRoute('group_all',['id'=>$id]);

        }

        return $this->render('admin/create_match.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/add-result/{id}", name="group_add_result")
     */
    public function addresult(MatchesGroup $match, Request $request)
    {

        $competition = $this->getDoctrine()->getRepository(Competition::class)->findOneBy([
            'user'=>$this->getUser(),
            'completed_on'=> null
        ]);

        $match->setPlayed(true);

        $form = $this->createForm(
            MatchesGroupType::class,
            $match
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($match);
            $em->flush();

            $this->addFlash('notice', 'Le résultat est mis à jour');


            if ($match->getScoreTeam1() > $match->getScoreTeam2()) {
                $team1 = $match->getTeam1();
                $teamWin = $this->getDoctrine()->getRepository(CompetitionTeams::class)->findOneBy(['team' => $team1]);
                $teamPoints = $teamWin->getPoints();
                $teamWin->setGoalsScored($match->getScoreTeam1());
                $teamWin->setGoalsConceded($match->getScoreTeam2());
                $teamWin->setMacthPlayed('1');
                $teamWin->setPoints($teamPoints + 3);
                $teamWin->setWin('1');
                $teamWin->setDraw('0');
                $teamWin->setLoss('0');

                $team2 = $match->getTeam2();
                $teamLoss = $this->getDoctrine()->getRepository(CompetitionTeams::class)->findOneBy(['team' => $team2]);
                $teamLoss->setGoalsScored($match->getScoreTeam2());
                $teamLoss->setGoalsConceded($match->getScoreTeam1());
                $teamLoss->setMacthPlayed('1');
                $teamLoss->setPoints('0');
                $teamLoss->setWin('0');
                $teamLoss->setDraw('0');
                $teamLoss->setLoss('1');


                $em = $this->getDoctrine()->getManager();
                $em->flush();

            } elseif ($match->getScoreTeam1() < $match->getScoreTeam2()) {
                $team1 = $match->getTeam1();
                $teamWin = $this->getDoctrine()->getRepository(CompetitionTeams::class)->findOneBy(['team' => $team1]);
                $teamWin->setGoalsScored($match->getScoreTeam1());
                $teamWin->setGoalsConceded($match->getScoreTeam2());
                $teamWin->setMacthPlayed('1');
                $teamWin->setPoints('0');
                $teamWin->setWin('0');
                $teamWin->setDraw('0');
                $teamWin->setLoss('1');

                $team2 = $match->getTeam2();
                $teamLoss = $this->getDoctrine()->getRepository(CompetitionTeams::class)->findOneBy(['team' => $team2]);
                $teamLoss->setGoalsScored($match->getScoreTeam2());
                $teamLoss->setGoalsConceded($match->getScoreTeam1());
                $teamLoss->setMacthPlayed('1');
                $teamLoss->setPoints('3');
                $teamLoss->setWin('1');
                $teamLoss->setDraw('0');
                $teamLoss->setLoss('0');


                $em = $this->getDoctrine()->getManager();
                $em->flush();

            } else {

                $team1 = $match->getTeam1();
                $teamWin = $this->getDoctrine()->getRepository(CompetitionTeams::class)->findOneBy(['team' => $team1]);
                $teamWin->setGoalsScored($match->getScoreTeam1());
                $teamWin->setGoalsConceded($match->getScoreTeam2());
                $teamWin->setMacthPlayed('1');
                $teamWin->setPoints('1');
                $teamWin->setWin('0');
                $teamWin->setDraw('1');
                $teamWin->setLoss('0');

                $team2 = $match->getTeam2();
                $teamLoss = $this->getDoctrine()->getRepository(CompetitionTeams::class)->findOneBy(['team' => $team2]);
                $teamLoss->setGoalsScored($match->getScoreTeam2());
                $teamLoss->setGoalsConceded($match->getScoreTeam1());
                $teamLoss->setMacthPlayed('1');
                $teamLoss->setPoints('1');
                $teamLoss->setWin('0');
                $teamLoss->setDraw('1');
                $teamLoss->setLoss('0');


                $em = $this->getDoctrine()->getManager();
                $em->flush();


            }
            return$this->redirectToRoute('group_all',['id'=>$competition->getId()]);
        }


        return $this->render('admin/add_result.html.twig',['form'=>$form->createView()]);
    }

}