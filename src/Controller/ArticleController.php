<?php

namespace Blog\Controller;

use Blog\Model\Article;
use Blog\Model\User;
use Blog\Repository\ArticleRepository;
use Blog\Repository\CategoryRepository;

class ArticleController extends AbstractController
{
    public function created(): string
    {
        if (isset(
                $_POST["field_article_subject"],
                $_POST["field_article_content"],
                $_POST["field_article_category"]) &&
            ($_SESSION['user'] instanceof User
            )) {

            $sTitle = strip_tags($_POST["field_article_subject"]);
            $sContent = strip_tags($_POST["field_article_content"]);
            $sCategory = strip_tags($_POST["field_article_category"]);

            $oCategory = CategoryRepository::find($sCategory);

            $oArticle = new Article($sTitle, $sContent, $oCategory);

            ArticleRepository::save($oArticle);

            $_SESSION['flashes'][] = ['SUCCESS' => 'Article soumis'];

            return $this->redirectAndDie('?page=' . PAGE_ADMIN);
        }
        return $this->redirectAndDie('?page=' . PAGE_HOME);
    }
}
