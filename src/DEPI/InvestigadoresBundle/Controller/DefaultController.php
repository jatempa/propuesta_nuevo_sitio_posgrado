<?php

namespace DEPI\InvestigadoresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InvestigadoresBundle:Default:index.html.twig');
    }
}
