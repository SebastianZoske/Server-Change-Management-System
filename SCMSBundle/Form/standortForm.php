<?php

namespace CDUCSU\SCMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of standortForm
 * @author szoske
 */
class standortForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('plz')
                ->add('ort')
                ->add('strasse')
                ->add('haus');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CDUCSU\SCMSBundle\Entity\Standort'
        ));
    }

    public function getName()
    {
        return 'standort';
    }

}

?>
