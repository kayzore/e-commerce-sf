<?php
namespace Kay\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoreController extends Controller
{
    public function homeAction()
    {
        return $this->render('KayCoreBundle:Core:home.html.twig');
    }
}