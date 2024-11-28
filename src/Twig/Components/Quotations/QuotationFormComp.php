<?php

namespace App\Twig\Components\Quotations;

use App\Entity\Quotation;
use Symfony\Component\Form\FormInterface;
use App\Form\Quotations\QuotationFormType;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\LiveCollectionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveListener;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\LiveComponent\ComponentToolsTrait;

#[AsLiveComponent]
final class QuotationFormComp extends AbstractController
{
    use DefaultActionTrait;
    use ComponentToolsTrait;
    use LiveCollectionTrait;

    #[LiveProp(fieldName: 'formData')]
    public ?Quotation $quotation;
   
    #[LiveAction]
    public function refresh()
    {
        $this->dispatchBrowserEvent('quotationLine:updated');
    }

    protected function instantiateForm(): FormInterface
    {
        $this->refresh();
        return $this->createForm(
            QuotationFormType::class,
            $this->quotation,
            ['method' => 'POST']
        );
    }
}
