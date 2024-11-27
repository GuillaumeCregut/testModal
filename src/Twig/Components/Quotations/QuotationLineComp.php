<?php

namespace App\Twig\Components\Quotations;

use App\Entity\Quotation;
use Symfony\Component\Form\FormInterface;
use App\Form\Quotations\QuotationLineFormType;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\LiveCollectionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent]
final class QuotationLineComp extends AbstractController
{
    use DefaultActionTrait;
    use LiveCollectionTrait;

    #[LiveProp()]
    public QuotationLineFormType $formLine;

    #[LiveProp()]
    public ?string $quotation; 

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(
            QuotationLineFormType::class,
            $this->quotation,
            ['method' => 'POST']
        );
    }
}
