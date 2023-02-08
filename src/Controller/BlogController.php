<?php

namespace Blog\Controller;


use Blog\Model\Article;
use Blog\Repository\ArticleRepository;

class BlogController extends AbstractController
{
    /**
     * @return string
     * @throws \Exception
     */
    public function article():string
    {
        $oArticle = ArticleRepository::find($_GET['article']);
        if (!$oArticle instanceof Article) {
            $this->redirectAndDie('?page='.PAGE_HOME);
        }
        return $this->render('article.php', [
            'article' => $oArticle,
        ]);
    }
}
