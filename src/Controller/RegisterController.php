<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 10/12/2018
 * Time: 07:46
 */

namespace App\Controller;


use App\Entity\Competition;
use App\Entity\Invitation;
use App\Entity\Player;
use App\Entity\User;
use App\Event\InvitationEvent;
use App\Event\PlayerRegisterCompleteEvent;
use App\Form\PlayerType;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register_admin")
     */
    public function registerAdmin(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(
            UserType::class,
            $user
        );

        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid())
        {
            $password = $passwordEncoder->encodePassword(
                $user,
                $user->getPlainPassword()
            );
            $user->setPassword($password);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $message = 'Vous allez maintenant recevoir un email pour valider votre inscription';
            $this->addFlash('notice', $message);

            $this->redirectToRoute('register_admin');

        }

        return $this->render('register/register_admin.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("player-register/{user}/{competition}/{token}", name="player_register")
     */
    public function playerRegister(string $token, Competition $competition, User $user,
                                   Request $request, UserPasswordEncoderInterface $passwordEncoder,
                                   EventDispatcherInterface $eventDispatcher)
    {
        $doctrine = $this->getDoctrine();
        $player = new Player();
        $player->setUser($user);
        $player->setCompetition($competition);
        $form = $this->createForm(
            PlayerType::class,
            $player
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {

            $password = $passwordEncoder->encodePassword(
                $player,
                $player->getPlainPassword()
            );
            $player->setPassword($password);
            $em = $doctrine->getManager();
            $em->persist($player);
            $em->flush();

            $event = new PlayerRegisterCompleteEvent();
            $event->setToken($token);
            $event->setUser($user);
            $eventDispatcher->dispatch(PlayerRegisterCompleteEvent::NAME, $event);


            return $this->redirectToRoute('security_login');
        }

        return $this->render('admin/player/player_register.html.twig', ['form'=>$form->createView()]);
    }

}