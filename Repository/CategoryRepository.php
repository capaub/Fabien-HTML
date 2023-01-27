<?php

namespace Blog\Repository;

use Blob\Model\Category;

class CategoryRepository
{
    public static function findAll(): array
    {
        $oCat1 = new Category("Auto/Moto");
        $oCat2 = new Category("Higth-Tech");
        $oCat3 = new Category("Santé");

        return [$oCat1, $oCat2, $oCat3,];
    }
}