<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 24/12/2018
 * Time: 13:41
 */

namespace App\Controller;


use App\Entity\Competition;
use App\Entity\Invitation;
use App\Entity\Player;
use App\Event\InvitationEvent;
use App\Form\InvitationType;
use App\Form\PlayerType;
use App\Security\TokenGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 */
class PlayerController extends AbstractController
{

    /**
     * @Route("/players", name="player_all")
     */
    public function player()
    {

        return $this->render('admin/player/all.html.twig');
    }

    /**
     * @Route("/add-player", name="player_add")
     */
    public function addPlayer(Request $request, EventDispatcherInterface $eventDispatcher, TokenGenerator $token)
    {

        $doctrine = $this->getDoctrine();
        $user= $this->getUser();
        $competition = $doctrine->getRepository(Competition::class)->findOneBy([
            'user'=>$this->getUser(),
            'completed_on'=> null
        ]);
        dump($competition);
        $invitation = new Invitation();
        $invitation->setUser($user);
        $invitation->setCompetition($competition);
        $invitation->setToken($token->createToken(30));
        $form = $this->createForm(
            InvitationType::class,
            $invitation
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid())
        {

            $em = $doctrine->getManager();
            $em->persist($invitation);
            $em->flush();

            $invitationEvent = new InvitationEvent($invitation);
            $eventDispatcher->dispatch(InvitationEvent::NAME, $invitationEvent);

            $this->addFlash('success', "L'invitation est envoyé");
        }

        return $this->render('admin/player/add.html.twig', ['form'=>$form->createView()]);
    }

}