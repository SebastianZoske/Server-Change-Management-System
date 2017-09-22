<?php

namespace CDUCSU\SCMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CDUCSU\SCMSBundle\Entity\User;
use CDUCSU\SCMSBundle\Form\userForm;

/**
 * Description of userController
 *
 * @author szoske
 */
class userController extends Controller {
    
    /**
     * @Route("/user/create", name="userCreate")
     * @Template()
     */
     public function createAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();

        $form = $this->createForm(new userForm(), $user);

        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                //insert
                $em->persist($user);
                $em->flush();

                 return $this->redirect($this->generateUrl('userShow'));
            }
        }

        return array('form' => $form->createView(), 'create' => TRUE);
    }
    
    /**
     * @Route("/user/edit", name="userEdit")
     * @Template()
     */
    public function editAction()
    {
        $id = $this->getRequest()->get('id');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('CDUCSUSCMSBundle:User')->find($id);
        
        $form = $this->createForm(new userForm(), $user);
        
        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                $em->merge($user);
                $em->flush();

                return $this->redirect($this->generateUrl('userShow'));
            }
        }
        
        return array('form' => $form->createView(), 'create' => FALSE);
    }
    
    /**
     * @Route("/user/show", name="userShow")
     * @Template()
     */
    public function userShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $liste = $em->getRepository('CDUCSUSCMSBundle:User')
                    ->findAll();
        
        return array('liste' => $liste);
    }
    
    /**
     * @Route("/user/erase", name="userErase")
     */
    public function userEraseAction()
    {
        $id = $this->getRequest()->get('id');
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('CDUCSUSCMSBundle:User')
                ->find($id);
        $em->remove($item);
        $em->flush();
        return $this->redirect($this->generateUrl('userShow'));
    }
}

?>
