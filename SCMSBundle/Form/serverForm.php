<?php

namespace CDUCSU\SCMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of serverForm
 * @author szoske
 */
class serverForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('bezeichnung')
                ->add('betriebssystem')
                ->add('funktion')
                ->add('standort');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CDUCSU\SCMSBundle\Entity\Server'
        ));
    }

    public function getName()
    {
        return 'server';
    }

}

?>