<?php

namespace Blog\Repository;

use Blog\Model\Article;

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
     */

    public static function find(): array
    {
        $aArticles = [];
        $aFilenames = glob(SAVE_DIR . DIRECTORY_SEPARATOR . '*.article');
        foreach ($aFilenames as $file) {
            $aArticles[] = unserialize(file_get_contents($file), ['allowed_classes' => true]);
        }
        return $aArticles;
    }

}