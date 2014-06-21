<?php

namespace DEPI\BackEndBundle\Controller;

use \FOS\UserBundle\Controller\SecurityController as BaseSecurityController;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends BaseSecurityController
{
    public function indexAction()
    {
        return $this->render('BackEndBundle:Security:index.html.twig');
    }
}