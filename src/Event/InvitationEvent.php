<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 04/01/2019
 * Time: 10:47
 */

namespace App\Event;


use App\Entity\Invitation;
use Symfony\Component\EventDispatcher\Event;

class InvitationEvent extends Event
{
    const NAME = 'invitation.sent';

    /**
     * @var Invitation
     */
    private $invitation;

    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
    }

    /**
     * @return Invitation
     */
    public function getInvitation(): Invitation
    {
        return $this->invitation;
    }



}