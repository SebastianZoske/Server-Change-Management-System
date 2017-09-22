<?php

namespace CDUCSU\SCMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CDUCSU\SCMSBundle\Entity\Aenderung;
use \CDUCSU\SCMSBundle\Form\aenderungForm;

/**
 * Description of aenderungController
 *
 * @author szoske
 */
class aenderungController extends Controller 
{    
    public function createAction()
    {
        $em = $this->getDoctrine()->getManager();
        $aenderung = new User();

        $form = $this->createForm(new aenderungForm(), $aenderung);

        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                //insert
                $em->persist($aenderung);
                $em->flush();

                 return $this->redirect($this->generateUrl('aenderungShow'));
            }
        }

        return array('form' => $form->createView(), 'create' => TRUE);
    }
    
    /**
     * @Route("/aenderung/edit", name="aenderungEdit")
     * @Template()
     */
    public function editAction()
    {
        
        $id = $this->getRequest()->get('id');
        $em = $this->getDoctrine()->getManager();
        $aenderung = $em->getRepository('CDUCSUSCMSBundle:Aenderung')->find($id);
        
        $form = $this->createForm(new aenderungForm(), $aenderung);
        
        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                $em->merge($aenderung);
                $em->flush();

                return $this->redirect($this->generateUrl('aenderungShow'));
            }
        }
        
        return array('form' => $form->createView(), 'create' => FALSE);
    }
    
    /**
     * @Route("/aenderung/show", name="aenderungShow")
     * @Template()
     */
    public function aenderungShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        //Alle Datensätze aus der Tabelle "Aenderung" auslesen
        $liste = $em->getRepository('CDUCSUSCMSBundle:Aenderung')
                    ->findAll();
        
        return array('liste' => $liste);
    }
    
    /**
     * @Route("/aenderung/erase", name="aenderungErase")
     */
    public function aenderungEraseAction()
    {
        // Die Id des zu löschenden Datensatzes wird ausgelesen
        $id = $this->getRequest()->get('id');
        $em = $this->getDoctrine()->getManager();
        // Datensatz wird in der Datenbank gesucht und anschließend gelöscht
        $item = $em->getRepository('CDUCSUSCMSBundle:Aenderung')
                ->find($id);
        $em->remove($item);
        $em->flush();
        return $this->redirect($this->generateUrl('aenderungShow'));
    }
}

?>
