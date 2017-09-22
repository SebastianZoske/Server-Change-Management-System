<?php

namespace CDUCSU\SCMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of aenderungForm
 * @author szoske
 */
class aenderungForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('beschreibung','textarea')
                ->add('server')
                ->add('datum', 'date')                
                ->add('uhrzeit', 'time', array(
                    'input' => 'datetime',
                    'widget' => 'choice'                    
                ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CDUCSU\SCMSBundle\Entity\Aenderung'
        ));
    }

    public function getName()
    {
        return 'aenderung';
    }

}

?>