<?php

namespace Codemaster\Bundle\MailupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MailupBundle:Default:index.html.twig', array('name' => $name));
    }
}
