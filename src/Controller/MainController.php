<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 09/12/2018
 * Time: 16:59
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{

    /**
     * @Route("/index", name="main_index")
     */
    public function mainPage()
    {

        return $this->render('main/index.html.twig',[]);
    }

}