<?php

namespace CDUCSU\SCMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CDUCSU\SCMSBundle\Entity\Standort;
use CDUCSU\SCMSBundle\Form\standortForm;

/**
 * Description of standortController
 *
 * @author szoske
 */
class standortController extends Controller {
    
    /**
     * @Route("/standort/create", name="standortCreate")
     * @Template()
     */
    public function createAction()
    {
        $em = $this->getDoctrine()->getManager();
        $standort = new User();

        $form = $this->createForm(new standortForm(), $standort);

        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                //insert
                $em->persist($standort);
                $em->flush();

                 return $this->redirect($this->generateUrl('standortShow'));
            }
        }

        return array('form' => $form->createView(), 'create' => TRUE);
    }
    
    /**
     * @Route("/standort/edit", name="standortEdit")
     * @Template()
     */
    public function editAction()
    {
        $id = $this->getRequest()->get('id');
        $em = $this->getDoctrine()->getManager();
        $standort = $em->getRepository('CDUCSUSCMSBundle:Standort')->find($id);
        
        $form = $this->createForm(new standortForm(), $standort);
        
        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                $em->merge($standort);
                $em->flush();

                return $this->redirect($this->generateUrl('standortShow'));
            }
        }
        
        return array('form' => $form->createView(), 'create' => FALSE);
    }
    
    /**
     * @Route("/standort/erase", name="standortErase")
     */
    public function standortEraseAction()
    {
        $id = $this->getRequest()->get('id');
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('CDUCSUSCMSBundle:Standort')
                ->find($id);
        $em->remove($item);
        $em->flush();
        return $this->redirect($this->generateUrl('standortShow'));
    }
}

?>
