<?php

namespace DEPI\BackEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackEndBundle:Default:index.html.twig');
    }

    public function loginAction(Request $peticion)
    {
        $sesion = $peticion->getSession();

        $error = $peticion->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR,
            $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );

        return $this->render(
            'BackEndBundle:Default:login.html.twig',
            array(
                'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
                'error'         => $error
            )
        );
    }

    public function logoutAction()
    {
        // Set the token to null and invalidate the session
        $this->getSecurityContext()->setToken(null);
        $this->getSession()->invalidate();

        // Redirect url and seconds (window.location)
        $seconds  = 5;
        $redirect = $this->redirect($this->generateUrl('posgradmin_login'));

        return array('seconds' => $seconds, 'redirect' => $redirect);
    }
}