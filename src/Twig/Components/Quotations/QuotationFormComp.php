<?php

namespace App\Twig\Components\Quotations;

use App\Entity\Quotation;
use Symfony\Component\Form\FormInterface;
use App\Form\Quotations\QuotationFormType;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\LiveCollectionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent]
final class QuotationFormComp extends AbstractController
{
    use DefaultActionTrait;
    use LiveCollectionTrait;

    #[LiveProp(fieldName: 'formData')]
    public ?Quotation $quotation;

    #[LiveProp()]
    public float $totalValueHT=0;

    #[LiveProp()]
    public float $totalValueTTC=0;

    public function calculateTotalValueTTC(float $totalValueHT): float
    {
        $totalValueTTC = $totalValueHT * 1.2;
        return $totalValueTTC;
    }

    public function calculateTotalValueHT(float $totalValueTTC): float
    {
        $totalValueHT = $totalValueTTC / 1.2;
        return $totalValueHT;
    }
    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(
            QuotationFormType::class,
            $this->quotation,
            ['method' => 'POST']
        );
    }
}
