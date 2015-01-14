<?php

namespace VVM\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function loginAction()
    {
        return $this->render('VVMUserBundle:User:login.html.twig');
    }
}
