<?php

namespace FutbolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EquipoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('nombre')
          ->add('tipo')
          ->add('entrenadores',EntityType::class, array(
            // query choices from this entity
            'class' => 'FutbolBundle:Entrenador',
            // use the User.username property as the visible option string
            'choice_label' => 'nombre',
            'multiple'=>true
          )
          );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FutbolBundle\Entity\Equipo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'futbolbundle_equipo';
    }


}
