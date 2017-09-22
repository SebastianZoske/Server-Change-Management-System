<?php

namespace CDUCSU\SCMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of DefaultController
 *
 * @author szoske
 */
class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CDUCSUSCMSBundle:Default:index.html.twig', array('name' => $name));
    }
}
