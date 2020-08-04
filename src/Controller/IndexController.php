<?php

namespace App\Controller;

use App\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function __construct()
    {
    }

    public function welcome()
    {
        /**
         * Récupérer
         * 1) les 6 dernier products.
         * 2) Tous les Mise en vedettes (featured)
         * 3) Tous les best seller
         * 4) Les nouveaux arrivages
         * 5) Les products hot
         * 6) Les offres spéciales
         * 7) Les deals specials.
         * Le tout en dans l'ordre du plus récent au plus ancien.
         */
        $repository = $this->getDoctrine()->getRepository(Products::class);

        /**
         *  The last 6 products.
         *
         * @TODO Modifier la requête pour récupérer
         *          6 dernier produits ajouté par les seller
         *          et non pas les 6 dernier produit créé
         */
        $lastProducts = $repository->findBy(
            [], // Where
            ['created_at' => 'DESC'], // Order by
            6
        );

        dump($lastProducts);
        /**
         *  FEATURED PRODUCTS.
         */
        $featuredProducts = $repository->findBy(
            ['featured' => 1], // Where
            ['created_at' => 'DESC'], // Order By
            15
        );
        dump($featuredProducts);
        /**
         *  BEST SELLER.
         */
        $bestSeller = $repository->findBy(
            ['best_seller' => 1], // Where
            ['created_at' => 'DESC'], // Order By
            15
        );
        dump($bestSeller);
        /**
         *  HOT DEALS.
         */
        $hotProduct = $repository->findBy(
            ['hot' => 1], // Where
            ['created_at' => 'DESC'], // Order by
            15,
        );
        dump($hotProduct);
        $specialDeal = [];
        for ($i = 0; $i < 3; ++$i) {
            /**
             *  SPECIAL DEALS.
             */
            $specialDealOld = $repository->findBy(
                ['special' => 1], // Where
                ['created_at' => 'DESC'], // Order by
                3,
                $i * 3
            );
            foreach ($specialDealOld as $product) {
                $specialDeal[$i][] = $product;
            }
        }
        dump($specialDeal);

        return $this->render(
            'pages/welcome.html.twig',
            [
                'lastProduct' => $lastProducts,
                'featuredProducts' => $featuredProducts,
                'bestSeller' => $bestSeller,
                'hotProduct' => $hotProduct,
                'specialDeal' => $specialDeal,
            ]
        );
    }

    public function details($id)
    {
        $repository = $this->getDoctrine()->getRepository(Products::class);
        $product = $repository->findById($id);
        dump($product);
        return $this->render(
            'pages/details.html.twig',
            [
                'product' => $product,
            ]
        );
    }

    public function category()
    {
        return $this->render('pages/category.html.twig');
    }

    public function error404()
    {
        return $this->render('pages/404.html.twig');
    }

    public function blog()
    {
        return $this->render('pages/blog.html.twig');
    }

    public function blogDetails()
    {
        return $this->render('pages/blog-details.html.twig');
    }

    public function checkout()
    {
        return $this->render('pages/checkout.html.twig');
    }

    public function contact()
    {
        return $this->render('pages/contact.html.twig');
    }

    public function faq()
    {
        return $this->render('pages/faq.html.twig');
    }

    public function whishlist()
    {
        return $this->render('pages/my-wishlist.html.twig');
    }

    public function product_comparison()
    {
        return $this->render('pages/product-comparison.html.twig');
    }

    public function cart()
    {
        return $this->render('pages/shopping-cart.html.twig');
    }

    public function signin()
    {
        return $this->render('pages/sign-in.html.twig');
    }

    public function conditions()
    {
        return $this->render('pages/terms-conditions.html.twig');
    }

    public function track_orders()
    {
        return $this->render('pages/track-orders.html.twig');
    }
}
