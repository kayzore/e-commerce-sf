<?php
namespace Kay\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * Displays a form to login an User.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError(); // get the login error if there is one

        $lastUsername = $authenticationUtils->getLastUsername(); // last username entered by the User

        return $this->render('KayUserBundle:Security:login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
}
