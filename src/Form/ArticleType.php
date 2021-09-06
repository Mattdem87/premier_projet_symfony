<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contenue',TextareaType::class,[
                'label' => 'contenu de l\'article',
            ])

            ->add('titre',TextType::class,[
                'label'=> 'Titre de l\'article',
                'attr' => [
                    'placeholder' => 'Taper le titre ici...'
                ]
            ])
            ->add('createdAt', DateType::class,[
                'label' => 'Date de publication'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
