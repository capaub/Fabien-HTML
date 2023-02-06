<?php

namespace Blog\Repository;

use Blog\Manager\DbManager;
use Blog\Model\Article;
use Blog\Model\Category;

class ArticleRepository
{

    /**
     * @param Article $oArticle
     * @return bool
     */
    public static function save(Article $oArticle): bool
    {
        $oPdo = DbManager::getInstance();

        $sQuery = 'INSERT INTO article (category_id, title, content, status, createdAt)
        VALUES (
                :category_id,
                :title,
                :content,
                :status,
                :createdAt
                )';

        $oPdoArt = $oPdo->prepare($sQuery);

        $oPdoArt->bindValue(':category_id', $oArticle->getCategory()->getId(), \PDO::PARAM_INT);
        $oPdoArt->bindValue(':title', $oArticle->getTitle(), \PDO::PARAM_STR);
        $oPdoArt->bindValue(':content', $oArticle->getContent(), \PDO::PARAM_STR);
        $oPdoArt->bindValue(':status', $oArticle->getStatus(), \PDO::PARAM_INT);
        $oPdoArt->bindValue(':createdAt', $oArticle->getCreatedAt()->format('Y-m-d H:i:s'), \PDO::PARAM_STR);

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
        $oPdoArticles = $oPdo->query('SELECT * FROM article');

        while ($oPdoArticle = $oPdoArticles->fetch()) {
            $oPdoCats = $oPdo->query('SELECT name FROM category WHERE id = "' . $oPdoArticle['category_id'] . '"')->fetch();

            $oArticle = new Article($oPdoArticle['title'], $oPdoArticle['content'], new Category($oPdoCats["name"]), $oPdoArticle['status']);
            $oArticle->setCreatedAt(new \DateTime($oPdoArticle['createdAt']));

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

        $oPdoArticle = $oPdo->query('SELECT * FROM article WHERE id = :id');
        $oPdoArticle->bindValue(':id', $iId, \PDO::PARAM_INT);
        $oPdoArticle->execute();

        $oBdArticle = $oPdoArticle->fetch();

        if ($oBdArticle) {

            $oArticle = new Article(
                $oBdArticle['title'],
                $oBdArticle['content'],
                CategoryRepository::find($oBdArticle['category_id']),
                $oBdArticle['status']);

            $oArticle->setCreatedAt(new \DateTime($oBdArticle['createdAt']));

            return $oArticle;
        }
        return NULL;
    }
}