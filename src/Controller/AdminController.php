<?php

namespace Blog\Controller;


use Blog\Model\Article;
use Blog\Model\Category;
use Blog\Model\User;
use Blog\Repository\ArticleRepository;
use Blog\Repository\CategoryRepository;
use Blog\Repository\UserRepository;

class AdminController extends AbstractController
{
    /**
     * @return string
     * @throws \Exception
     */
    public function admin() :string
    {
        // security
        if(!isset($_SESSION['user'])
            || !$_SESSION['user'] instanceof User
            || ($_SESSION['user']->getRole() !== User::ROLE_ADMIN)) {
            $this->redirectAndDie('index.php?page=home');
        }

        //Est-ce que le formulaire de creation d'article a été soumis
        if(isset($_POST['form_new_article'], $_POST['field_article_subject'],$_POST['field_article_content'],$_POST['field_article_category'])) {
            //récupérer (+nettoyer) les données du formulaire
            $sCleanCategoryId = filter_input(INPUT_POST, 'field_article_category', FILTER_SANITIZE_STRING);
            $sCleanTitle = filter_var($_POST['field_article_subject'],FILTER_SANITIZE_STRING);
            $sCleanContent = filter_var($_POST['field_article_content'], FILTER_SANITIZE_STRING);

            // Récupération rapide de notre catégorie vo=ia le repository
            $oCategory = CategoryRepository::find($sCleanCategoryId);
            if($oCategory instanceof Category) {
                $oArticle = new Article($sCleanTitle,$sCleanContent, $oCategory);

                // on regarde si un ficheir a été uploadé
                if(isset($_FILES['file_picture'])) {
                    if($_FILES['file_picture']['error'] === UPLOAD_ERR_OK) {
                        $sFilepathTmp = $_FILES['file_picture']['tmp_name']; // D:\Temp\php89F1.tmp

                        $sFilenameNew = uniqid() . '.' . pathinfo(['file_picture']['name'], PATHINFO_EXTENSION);
                        $FilepathNew = DIR_UPLOADS . DIRECTORY_SEPARATOR .$sFilenameNew;

                        $aPictureInfo = getimagesize($sFilepathTmp);
                        if($aPictureInfo) {
                            if(move_uploaded_file($sFilepathTmp,$sFilenameNew)) {
                                $oArticle->setPicture($sFilenameNew);
                            }
                        }
                    }
                }
                ArticleRepository::save($oArticle);
            }
            $this->redirectAndDie('index.php?page='.PAGE_HOME);
        }
        return $this->render('admin.php', [
            'seo_title' => TITLE_ADMIN,
            'users' => UserRepository::findAll(),
            'categories'=> CategoryRepository::findAll()
        ]);
    }
}