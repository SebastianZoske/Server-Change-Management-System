<?php

namespace CDUCSU\SCMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CDUCSU\SCMSBundle\Entity\Server;
use CDUCSU\SCMSBundle\Form\serverForm;

/**
 * Description of serverController
 *
 * @author szoske
 */
class serverController extends Controller {
    
    /**
     * @Route("/server/create", name="serverCreate")
     * @Template()
     */
    public function createAction()
    {
        $em = $this->getDoctrine()->getManager();
        $server = new Server();

        $form = $this->createForm(new serverForm(), $server);

        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                //insert
                $em->persist($server);
                $em->flush();

                 return $this->redirect($this->generateUrl('serverShow'));
            }
        }

        return array('form' => $form->createView(), 'create' => TRUE);
    }
    
    /**
     * @Route("/server/edit", name="serverEdit")
     * @Template()
     */
    public function editAction()
    {
        $id = $this->getRequest()->get('id');
        $em = $this->getDoctrine()->getManager();
        $server = $em->getRepository('CDUCSUSCMSBundle:Server')->find($id);
        
        $form = $this->createForm(new serverForm(), $server);
        
        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                $em->merge($server);
                $em->flush();

                return $this->redirect($this->generateUrl('serverShow'));
            }
        }
        
        return array('form' => $form->createView(), 'create' => FALSE);
    }
    
    
    /**
     * @Route("/server/show", name="serverShow")
     * @Template()
     */
    public function serverShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $liste = $em->getRepository('CDUCSUSCMSBundle:Server')
                    ->findAll();
        
        return array('liste' => $liste);
    }
    
    /**
     * @Route("/server/erase", name="serverErase")
     */
    public function serverEraseAction()
    {
        $id = $this->getRequest()->get('id');
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('CDUCSUSCMSBundle:Server')
                ->find($id);
        $em->remove($item);
        $em->flush();
        return $this->redirect($this->generateUrl('serverShow'));
    }
}

?>
