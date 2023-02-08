<?php

namespace Blog\Repository;

use Blog\Manager\DbManager;
use Blog\Model\Article;

class ArticleRepository
{

    /**
     * @param Article $oArticle
     * @return bool
     */
    public static function save(Article $oArticle): bool
    {
        $oPdo = DbManager::getInstance();

        $sQuery = 'INSERT INTO article (category_id, title, content, status, createdAt, picture)
        VALUES (:category_id, :title, :content, :status, :createdAt, :picture)';

        $oPdoArt = $oPdo->prepare($sQuery);

        $oPdoArt->bindValue(':category_id', $oArticle->getCategory()->getId(), \PDO::PARAM_INT);
        $oPdoArt->bindValue(':title', $oArticle->getTitle(), \PDO::PARAM_STR);
        $oPdoArt->bindValue(':content', $oArticle->getContent(), \PDO::PARAM_STR);
        $oPdoArt->bindValue(':status', $oArticle->getStatus(), \PDO::PARAM_INT);
        $oPdoArt->bindValue(':createdAt', $oArticle->getCreatedAt()->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $oPdoArt->bindValue(':picture', $oArticle->getPicture(), \PDO::PARAM_STR);

        return $oPdoArt->execute();
    }

    /**
     * @return array
     * @throws \Exception
     */
    public static function findAll(): array
    {
        $oPdo = DbManager::getInstance();

        $aArticles = [];
        $oPdoArticles = $oPdo->query('SELECT * FROM `article` ORDER BY `createdAt` DESC ');

        while ($oDbArticle = $oPdoArticles->fetch( \PDO::FETCH_ASSOC)) {
            $oCategoryArt = CategoryRepository::find($oDbArticle['category_id']);

            $oArticle = new Article(
                $oDbArticle['title'],
                $oDbArticle['content'],
                $oCategoryArt,
                $oDbArticle['status']
            );

            $oArticle->setCreatedAt(new \DateTime($oDbArticle['createdAt']));
            $oArticle->setId($oDbArticle['id']);
            $oArticle->setPicture($oDbArticle['picture']);
            $oArticle->setStatus($oDbArticle['status']);

            $aArticles[] = $oArticle;
        }
        return $aArticles;
    }

    /**
     * @param $iId
     * @return Article|null
     * @throws \Exception
     */
    public static function find($iId): ?Article
    {
        $oPdo = DbManager::getInstance();

        $sQuery = 'SELECT * FROM article WHERE id = :id';

        $oPdoArticle = $oPdo->prepare($sQuery);
        $oPdoArticle->bindValue(':id', $iId, \PDO::PARAM_INT);
        $oPdoArticle->execute();

        $oBdArticle = $oPdoArticle->fetch();

        if ($oBdArticle) {

            $oArticle = static::hydrate($oBdArticle);

            return $oArticle;
        }
        return NULL;
    }
    private static function hydrate($oBdArticle):Article
    {
        $oCategoryArt = CategoryRepository::find($oBdArticle['category_id']);

        $oArticle = new Article(
            $oBdArticle['title'],
            $oBdArticle['content'],
            $oCategoryArt
        );

            $oArticle->setCreatedAt(new \DateTime($oBdArticle['createdAt']));
            $oArticle->setId($oBdArticle['id']);
            $oArticle->setPicture($oBdArticle['picture']);
            $oArticle->setStatus($oBdArticle['status']);

            return $oArticle;
    }

}