<?php

namespace App\Form;

use App\Entity\Checkpoint;
use App\Entity\Curriculum;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CheckpointType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('curriculum',EntityType::class,[
                'class' => Curriculum::class,
                'choice_label' => 'name'
            ])
            ->add('number',IntegerType::class,[
                'label' => 'Checkpoint n°'
            ])
            ->add('name',TextType::class,[
                'label' => 'Title'
            ])
            ->add('duration',TextType::class,[
                'label'=>'Duration (h:mm)'
            ])
            ->add('objectives',CollectionType::class,[
                'entry_type' => ObjectiveType::class,
                'entry_options' => ['label'=>false],
                'allow_add'=>true,
                'by_reference' => false,
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
