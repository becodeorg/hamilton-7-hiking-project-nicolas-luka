<?php
declare(strict_types=1);


class ProductController
{
    private Product $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index(): void
    {
        $products = $this->productModel->findAll();

        include 'views/includes/header.view.php';
        include 'views/index.view.php';
        include 'views/includes/footer.view.php';
    }

    public function show(string $name): void
    {
         if (empty($name)) {
             throw new Exception("Product code was not provided.");
         }

        $product = $this->productModel->find($name);

        include 'views/includes/header.view.php';
        include 'views/product.view.php';
        include 'views/includes/footer.view.php';
    }
}