<?php

namespace App\Form;

use App\Entity\Checkpoint;
use App\Entity\Curriculum;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditCheckpointType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('number')
            ->add('duration')
            ->add('isVisible')
            ->add('curriculum',EntityType::class,[
                'class' => Curriculum::class,
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Checkpoint::class,
        ]);
    }
}
