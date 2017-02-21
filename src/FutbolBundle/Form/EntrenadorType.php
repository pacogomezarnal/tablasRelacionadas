<?php

namespace FutbolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FutbolBundle\Entity\Entrenador;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EntrenadorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')->add('apellidos')
        ->add('equipos',EntityType::class, array(
          // query choices from this entity
          'class' => 'FutbolBundle:Equipo',
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
            'data_class' => 'FutbolBundle\Entity\Entrenador'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'futbolbundle_entrenador';
    }


}
