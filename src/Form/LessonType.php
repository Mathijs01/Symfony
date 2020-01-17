<?php

namespace App\Form;

use App\Entity\Lesson;
use App\Entity\Training;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LessonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('time', TextType::class, [])
//            ->add('date' , DateTimeType::class, [])
            ->add('location', TextType::class, [])
            ->add('max_persons', IntegerType::class,[])
            ->add('instructor_id', TextType::class, []);
//            ->add('training', EntityType::class, ['class' => Training::class])

//        dd($builder);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lesson::class,
        ]);
    }
}
