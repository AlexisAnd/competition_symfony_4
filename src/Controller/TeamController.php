<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 10/12/2018
 * Time: 17:12
 */

namespace App\Controller;


use App\Entity\Teams;
use App\Form\TeamType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{
    /**
     * @Route("/addteam", name="team_add")
     */
    public function addTeam(Request $request)
    {
        $team = new Teams();
        $form = $this->createForm(
            TeamType::class,
            $team
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid())
        {
            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($team);
            $entitymanager->flush();

            $this->redirectToRoute('team_add');

        }

        return $this->render('team/add.html.twig', ['form'=>$form->createview()]);
    }

}