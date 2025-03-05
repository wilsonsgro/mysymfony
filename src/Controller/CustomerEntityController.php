<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use App\Entity\CustomerEntity;
use Doctrine\Persistence\ManagerRegistry;

class CustomerEntityController extends AbstractController
{
    #[Route('/customer/entity', name: 'app_customer_entity')]
    public function index(): Response
    {
        return $this->render('customer_entity/index.html.twig', [
            'controller_name' => 'CustomerEntityController',
        ]);
    }

    #[Route('/customer/{id}', name: 'customer_show')]
    public function customershow(ManagerRegistry $doctrine, int $id): Response
    {

        $customerEntity = $doctrine->getRepository(CustomerEntity::class)->find($id);

        if (!$customerEntity) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render('customer_entity/email.html.twig', [
            'email' => $customerEntity->getEmail(),
        ]);

        return new Response('Check out this great customer: '.$customerEntity->getEmail());

        return $this->render('customer_entity/email.html.twig', [
            'controller_name' => 'CustomerEntityController',
        ]);
    }
}
