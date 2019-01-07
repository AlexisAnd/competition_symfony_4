<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 10/12/2018
 * Time: 13:06
 */

namespace App\Controller;


use App\Entity\Competition;
use App\Entity\CompetitionTeams;
use App\Form\CompetitionTeamsType;
use App\Form\CompetitionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Security("is_granted('ROLE_ADMIN')")
 */
class CompetitionController extends AbstractController
{

    /**
     * @Route("/create_competition", name="competition_create")
     */
    public function create(Request $request)
    {
        $user = $this->getUser();
        $competition = new Competition();
        $competition->setUser($user);
        $form = $this->createForm(
                CompetitionType::class,
                $competition
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($competition);
            $entityManager->flush();


            return $this->redirectToRoute('competition_all_no_groups');

        }

        return $this->render('admin/create_competition.html.twig', ['form'=>$form->createView()]);

    }

    /**
     * @Route("/list_no_groups", name="competition_all_no_groups")
     */
    public function listCompetitionsNoGroups(Request $request)
    {

        $doctrine = $this->getDoctrine();
        $competitions = $doctrine->getRepository(Competition::class)->findAllWhereGroupsNotCreated($this->getUser());

        $competition = $doctrine->getRepository(Competition::class)->findOneBy([
            'user'=>$this->getUser(),
            'completed_on'=> null
        ]);



        $compet = $doctrine->getRepository(Competition::class)->findCompetitionFull($competitions);
        $competFull = $compet[1];

        $groupATeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupA($competition);
        dump($groupATeams);
        $groupBTeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupB($competition);
        $groupCTeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupC($competition);
        $groupDTeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupD($competition);
        $groupETeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupE($competition);
        $groupFTeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupF($competition);
        $groupGTeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupG($competition);
        $groupHTeams = $doctrine->getRepository(CompetitionTeams::class)->findTeamsGroupH($competition);

        $competition->setGroupscreated(true);

        $form = $this->createForm(
            CompetitionType::class,
            $competition
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $message = 'La compétition est validée';
            $this->addFlash('notice', $message);

            return $this->redirectToRoute('admin_index');
            }


        return $this->render('admin/list_no_groups.html.twig',['form'=>$form->createView(),'competitions'=>$competitions,
            'teamsGroupA'=>$groupATeams, 'teamsGroupB'=>$groupBTeams,
            'teamsGroupC'=>$groupCTeams, 'teamsGroupD'=>$groupDTeams, 'teamsGroupE'=>$groupETeams,
            'teamsGroupF'=>$groupFTeams, 'teamsGroupG'=>$groupGTeams, 'teamsGroupH'=>$groupHTeams,
            'competFull'=>$competFull]);


    }


    /**
     * @Route("/create-groups/{id}", name="competition_create_groups")
     */
    public function CreateGroups(Request $request, Competition $competition)
    {
        $competitionFull = $this->getdoctrine()->getRepository(Competition::class)->findCompetitionFull($competition);

        if ($competitionFull[1] == 32) {

            return $this->redirectToRoute('competition_all_no_groups');
        }
        else {
            $competitionTeams = new CompetitionTeams();

            $competitionTeams->setCompetition($competition);
            $form = $this->createForm(
                CompetitionTeamsType::class,
                $competitionTeams
            );

            $form->handleRequest($request);
            if ($form->isSubmitted() and $form->isValid()) {

                $team = $competitionTeams->getTeam();
                $group = $competitionTeams->getsection();

                $teams = $this->getDoctrine()->getRepository(CompetitionTeams::class)->findTeamByName($competition, $team);
                $groupFull = $this->getdoctrine()->getRepository(CompetitionTeams::class)->findGroup($competition, $group);


                if ($groupFull == 4) {

                    $this->addFlash('notice', "Le groupe contient déja 4 équipes");

                } else {

                    if (!$teams) {

                        $em = $this->getDoctrine()->getManager();
                        $em->persist($competitionTeams);
                        $em->flush();

                        $this->addFlash('success', "l'équipe est enregistrée");
                    } else {
                        $this->addFlash('notice', "L'équipe est déja enregistrée");
                    }
                }

            }
        }

            return $this->render('admin/create_groups.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("edit/{id}", name="competition_edit_group")
     */
    public function editGroup(CompetitionTeams $competitionTeams, Request $request)
    {
        $competition = $this->getDoctrine()->getRepository(Competition::class)->findOneBy([
            'user'=>$this->getUser(),
            'completed_on'=> null
        ]);

        $form = $this->createForm(
            CompetitionTeamsType::class,
            $competitionTeams
        );

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $team = $competitionTeams->getTeam();

            $teams = $this->getDoctrine()->getRepository(CompetitionTeams::class)->findTeamByName($competition, $team);

            if (!$teams) {

                $em = $this->getDoctrine()->getManager();
                $em->flush();

                return $this->redirectToRoute('competition_all_no_groups');
            } else {
                $this->addFlash('notice', "L'équipe est déja enregistrée. Choisissez en une autre");
            }

        }
        return $this->render('admin/edit_group.html.twig',['form'=>$form->createView()]);
    }

}