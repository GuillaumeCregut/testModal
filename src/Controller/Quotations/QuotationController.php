<?php

namespace App\Controller\Quotations;

use App\Entity\Quotation;
use App\Form\Quotations\QuotationFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/quotations', name: 'quotations_')]
class QuotationController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $quotation = new Quotation();
        $form = $this->createForm(QuotationFormType::class, $quotation);
        return $this->render('quotations/index.html.twig', [
            'form' => $form,
            'quotation' => $quotation
        ]);
    }
}
