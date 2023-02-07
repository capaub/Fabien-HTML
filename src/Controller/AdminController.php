<?php

namespace Blog\Controller;

use Blog\Repository\UserRepository;

class AdminController extends AbstractController
{
    public function admin()
    {
        return $this->render('admin.php', [
            'seo_title' => TITLE_ADMIN,
            'users' => UserRepository::findAll()
        ]);
    }
}