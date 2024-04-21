<?php

namespace App\Interfaces;

interface CategoryInterface
{

    public function getCategories();

    public function addCategory(string $name);


    public function deleteCategory(int $id);
}
