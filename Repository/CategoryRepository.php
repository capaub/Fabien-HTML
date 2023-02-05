<?php

namespace Blog\Repository;

use Blog\Model\Category;

class CategoryRepository
{
    public static function findAll(): array
    {
        global $oPdo;

        $aCats =[];

        $oPdoCats = $oPdo->query('SELECT * FROM category');

        while ($oPdoCat = $oPdoCats->fetch()){
            $oCat = new Category($oPdoCat['name']);
            $aCats [] = $oCat;
        }

        return $aCats;

//        $oCat1 = new Category("Auto/Moto");
//        $oCat2 = new Category("Higth-Tech");
//        $oCat3 = new Category("Santé");
//
//        return [$oCat1, $oCat2, $oCat3,];

    }
}