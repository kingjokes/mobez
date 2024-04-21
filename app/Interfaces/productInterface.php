<?php

namespace App\Interfaces;



interface ProductInterface
{

    public function getProducts();

    public function deleteProduct(int $id);

    public function productDetails(int $id);

    public function updateProduct(array $details);

    public function addProduct (array $details, $image, $prodImages);
    
}
