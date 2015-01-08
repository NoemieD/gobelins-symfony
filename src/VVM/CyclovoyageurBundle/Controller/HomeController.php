<?php

namespace VVM\CyclovoyageurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('VVMCyclovoyageurBundle:Home:index.html.twig');
    }
}
