<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 10/12/2018
 * Time: 10:57
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="security_login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();


        return $this->render('security/login.html.twig',['error'=>$error, 'last_username'=>$lastUsername]);

    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {


    }

}