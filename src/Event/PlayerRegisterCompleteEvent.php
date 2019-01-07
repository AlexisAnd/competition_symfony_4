<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 07/01/2019
 * Time: 12:10
 */

namespace App\Event;


use Symfony\Component\EventDispatcher\Event;

class PlayerRegisterCompleteEvent extends Event
{

    const NAME = 'player.register.complete';

    private $user;
    private $token;
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
    public function getToken()
    {
        return $this->token;
    }
    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }


}