<?php

namespace Blog\Repository;

use Blog\Manager\DbManager;
use Blog\Model\Category;

class CategoryRepository
{
    /**
     * @return array
     */
    public static function findAll(): array
    {
        $oPdo = DbManager::getInstance();

        $aCats = [];

        $sQuery = 'SELECT * FROM `category`';

        $oPdoCats = $oPdo->query($sQuery);


        while ($oPdoCat = $oPdoCats->fetch( \PDO::FETCH_ASSOC)) {
            $oCat = new Category($oPdoCat['name']);
            $oCat->setId($oPdoCat['id']);
            $aCats [] = $oCat;
        }

        return $aCats;
    }

    /**
     * @param int $iId
     * @return Category|null
     */
    public static function find(int $iId): ?Category
    {
        $oPdo = DbManager::getInstance();

        $sQuery = 'SELECT * FROM `category` WHERE `id` = :id';

        $oBdCategory = $oPdo->prepare($sQuery);
        $oBdCategory->bindValue(':id', $iId, \PDO::PARAM_INT);
        $oBdCategory->execute();

        $aBdCategory = $oBdCategory->fetch();
        if ($aBdCategory) {
            $oCat = new Category($aBdCategory['name']);
            $oCat->setId($aBdCategory['id']);

            return $oCat;
        }

        return null;
    }
}