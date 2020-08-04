<?php

namespace App\Controller;

use App\Entity\Products;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TestController extends AbstractController
{
    private ObjectRepository $productEntity;
    private ObjectManager $entityManager;

    public function __constructeur()
    {
        $this->entityManager = $this->getDoctrine()->getManager();
        $this->productEntity = $this->entityManager->getRepository(Products::class);
    }

    public function createProduct(ValidatorInterface $validator)
    {
        $product = (new Products())
            ->setName('Keyboard2')
            ->setDescription('Ma super description');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $errors = $validator->validate($product);

        if (count($errors) > 0) {
            return  new Response((string) $errors, 400);
        }
        // actually executes the queries (i.e. the INSERT query)
        //$entityManager->flush();
        return $this->render('lucky/number.html.twig', ['number' => 5]);
    }

    public function getProduct(string $id)
    {
        $product = $this->productEntity->find((int) $id);
        if (!$product) {
            throw $this->createNotFoundException("No product found for id $id");
        }
        dump($product);

        return $this->render('lucky/number.html.twig');
    }

    public function getProducts()
    {
        $products = $this->productEntity->findAll();
        if (!$products) {
            throw $this->createNotFoundException('No product found');
        }

        dump($products);

        $product2 = $this->productEntity->findByExampleField();

        dump($product2);

        return $this->render('lucky/number.html.twig');
    }

    public function updateProduct($id, ValidatorInterface $validator)
    {
        $product = $this->productEntity->find($id);

        if (!$product) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }
        dump($product);
        $product->setName('Casque audio')
            ->setDescription('Super casque 7.1 surround de la mort');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $errors = $validator->validate($product);

        if (count($errors) > 0) {
            return  new Response((string) $errors, 400);
        }
        $this->entityManager->flush();
        // actually executes the queries (i.e. the INSERT query)
        //$entityManager->flush();
        dump($product);

        return $this->render('lucky/number.html.twig', ['number' => 5]);
    }

    public function deleteProduct($id)
    {
        $product = $this->productEntity->find($id);

        if (!$product) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }

        $this->entityManager->remove($product);
        $this->entityManager->flush();

        return $this->render('lucky/number.html.twig', ['number' => 5]);
    }
}
