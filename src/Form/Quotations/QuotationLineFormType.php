<?php

namespace App\Form\Quotations;

use App\Entity\Product;
use App\Entity\QuotationLine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class QuotationLineFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description')
            ->add('quantity')
            ->add('price')
            ->add('vat')
            ->add('discount')
            ->add('itemReference', EntityType::class, [
                'class' => Product::class,
                'choice_label' => 'designation',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => QuotationLine::class,
        ]);
    }
}
