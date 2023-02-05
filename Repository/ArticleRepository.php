<?php

namespace Blog\Repository;

use Blog\Model\Article;
use Blog\Model\Category;

class ArticleRepository
{

    /**
     * @param Article $oArticle
     * @return void
     */
    public static function save(Article $oArticle): void
    {
        file_put_contents(SAVE_DIR . DIRECTORY_SEPARATOR . uniqid("art_", false) . '.article', serialize($oArticle));
    }

    /**
     * @return array
     * @throws \Exception
     */
    public static function findAll(): array
    {
        global $oPdo;

        $aArticles = [];
        $oPdoArticles = $oPdo->query('SELECT * FROM article');

        while ($oPdoArticle = $oPdoArticles->fetch()) {
            $oPdoCats = $oPdo->query(
                'SELECT name
                FROM category
                WHERE id = "'.$oPdoArticle['category_id'].'"
                ')->fetch();

            $oArticle = new Article($oPdoArticle['title'], $oPdoArticle['content'],new Category($oPdoCats["name"]), $oPdoArticle['status']);
            $oArticle->setCreatedAt(new \DateTime($oPdoArticle['createdAt']));

            $aArticles[] = $oArticle;
        }
        return $aArticles;
    }
}