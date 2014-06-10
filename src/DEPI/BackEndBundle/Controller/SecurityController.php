<?php

namespace DEPI\BackEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller
{
    public function indexAction()
    {
        $respuesta = $this->render('BackEndBundle:Default:index.html.twig');
        $respuesta->setMaxAge(15 * 60);

        return $respuesta;
    }

    public function loginAction(Request $peticion)
    {
        $sesion = $peticion->getSession();

        $error = $peticion->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR,
            $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );

        $respuesta = $this->render(
            'BackEndBundle:Default:login.html.twig',
            array(
                'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
                'error'         => $error
            )
        );

        $respuesta->setMaxAge(15 * 60);

        return $respuesta;
    }
}