<main>
<h1>Mon Blog</h1>
    <?php

    /**$aArticles = loadArticles();
     *
     * Charger les Articles
    foreach ($aArticles as $oArticle)
    {
        echo '<div>'.
        '<h2>'.$oArticle->getTitle().'</h2>'.
        '<strong>'.$oArticle->getCategory()->getName().'</strong>'.
        '<p>'.$oArticle->getContent().'</p>'.
        '<p>'.$oArticle->getCreatedAt()->format('j-M-y H:i:s').'</p>'.
        '<p>'.Article::STATUS[$oArticle->getStatus()].'</p>'.'</div>';
    }*/

    /**
     *
     * Charger les Users
    $aUsers = loadUser();
    foreach ($aUsers as $aUser)
    {
        echo '<div>'.
            '<h2>Username : '.$aUser->getUserName().'</h2>'.
            '<p>Email : '.$aUser->getEmail().'</p>'.
            '<p>Birthdate : '.$aUser->getBirthAt()->format('j-M-y').'</p>'.'</div>';
    }*/

    ?>
</main>