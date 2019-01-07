<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 04/01/2019
 * Time: 10:56
 */

namespace App\Event;


use App\Entity\Invitation;

use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class InvitationSubscriber implements EventSubscriberInterface
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * @var \Twig_Environment
     */
    private $twig;
    /**
     * @var ManagerRegistry
     */
    private $doctrine;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig, ManagerRegistry $doctrine)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->doctrine = $doctrine;
    }

    public static function getSubscribedEvents()
    {

        return [
            InvitationEvent::NAME => 'onInvitationSent',
            PlayerRegisterCompleteEvent::NAME => 'playerRegisterComplete',
        ];

    }


    public function onInvitationSent(InvitationEvent $invitationEvent)
    {
        $user = $invitationEvent->getInvitation()->getUser();
        $competition = $invitationEvent->getInvitation()->getCompetition();
        $token = $invitationEvent->getInvitation()->getToken();

        $message = (new \Swift_Message())
            ->setSubject('Invitation à la compétition')
            ->setFrom('competition@competition.com')
            ->setTo($invitationEvent->getInvitation()->getEmail())
            ->setBody($this->twig->render('mailing/invitation.html.twig', [
                'user'=>$user, 'competition'=>$competition, 'token'=>$token]), 'text/html'
            );

        $this->mailer->send($message);


    }

    public function playerRegisterComplete(PlayerRegisterCompleteEvent $event)
    {

        $this->doctrine->getRepository(Invitation::class)->deleteInvitation(
            $event->getToken()
        );

    }


}