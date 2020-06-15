<?php

namespace App\Controller;

use App\Service\FizzbuzzGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FizzController extends AbstractController
{
    /**
     * @Route("/fizz", name="fizz")
     */
    public function index(FizzbuzzGenerator $fizzbuzzGenerator, Request $request)
    {
        $messages = [];

        $form = $this->createFormBuilder()
                ->add('number', NumberType::class, ['label' => 'Entrez un nombre'])
                ->add('send', SubmitType::class, ['label' => 'Valider'])
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $messages = $fizzbuzzGenerator->getFizzBuzz($data['number']);
        }


        return $this->render("base.html.twig", [
            'messages' => $messages,
            'form' => $form->createView(),
        ]);

    }
}
