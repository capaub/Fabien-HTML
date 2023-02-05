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
        global $oPdo;
        $oPdo->query('INSERT INTO article (category_id, title, content, status, createdAt)
        VALUES (
                "' . $oArticle->getCategory()->getName() . '",
                "' . $oArticle->getTitle() . '",
                "' . $oArticle->getContent() . '",
                "' . $oArticle->getStatus() . '",
                "' . $oArticle->getCreatedAt()->format('Y-m-d') . '"
                ');
//        file_put_contents(SAVE_DIR . DIRECTORY_SEPARATOR . uniqid("art_", false) . '.article', serialize($oArticle));
    }

//    public static function save(Article $oArticle): void
//    {
//        global $oPdo;
//        $oPdo->query('INSERT INTO Article();
//        VALUES (
//                "' . $oArticle->getTitle() . '",
//                "' . $oArticle->getPassword() . '",
//                "' . $oArticle->getRole() . '",
//                "' . $oArticle->getEmail() . '",
//                "' . $oArticle->getCreatedAt()->format('Y-m-d') . '",
//                "' . $oArticle->getConnectedAt()->format('Y-m-d H:i:s') . '",
//                "' . $oArticle->getBirthAt()->format('Y-m-d') . '")
//                ');
//    }
//    public static function save(User $oUser): void
//    {
//        global $oPdo;
//        $oPdo->query('INSERT INTO user (username, password, role, email, createdAt, connectedAt, birthAt)
//        VALUES (
//                "' . $oUser->getUserName() . '",
//                "' . $oUser->getPassword() . '",
//                "' . $oUser->getRole() . '",
//                "' . $oUser->getEmail() . '",
//                "' . $oUser->getCreatedAt()->format('Y-m-d') . '",
//                "' . $oUser->getConnectedAt()->format('Y-m-d H:i:s') . '",
//                "' . $oUser->getBirthAt()->format('Y-m-d') . '")
//                ');
//    }
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

//    public static function findRand(): array
//    {
//        global $oPdo;
//
//        $aArticles = [];
//        $oPdoArticles = $oPdo->query('SELECT * FROM article');
//
//        while ($oPdoArticle = $oPdoArticles->fetch()) {
//            $oPdoCats = $oPdo->query(
//                'SELECT name
//                FROM category
//                WHERE id = "'.$oPdoArticle['category_id'].'"
//                ')->fetch();
//
//            $oArticle = new Article($oPdoArticle['title'], $oPdoArticle['content'],new Category($oPdoCats["name"]), $oPdoArticle['status']);
//            $oArticle->setCreatedAt(new \DateTime($oPdoArticle['createdAt']));
//
//            $aArticles[] = $oArticle;
//        }
//        return $aArticles;
//    }
}