<main>
    <h1>Mon Blog</h1>
    <?php

    use Blog\Repository\ArticleRepository;
    use Blog\Repository\UserRepository;

//    $aArticles = ArticleRepository::find();

//    foreach ($aArticles as $oArticle) {
//        echo '<div>' .
//            '<h2>' . $oArticle->getTitle() . '</h2>' .
//            '<strong>' . $oArticle->getCategory()->getName() . '</strong>' .
//            '<p>' . $oArticle->getContent() . '</p>' .
//            '<p>' . $oArticle->getCreatedAt()->format('j-M-y H:i:s') . '</p>' .
//            '<p>' . Article::STATUS[$oArticle->getStatus()] . '</p>' . '</div>';
//    }

//    $oUsers = UserRepository::findAll();
//    foreach ($oUsers as $oUser) {
//        echo '<div style="width: 60%">' .
//            '<p>Username : ' . $oUser->getUserName() . '</p>' .
//            '<p>Adresse mail : ' . $oUser->getEmail() . '</p>' .
//            //'<p>Date de naissance : '.$oUser->getBirthAt().'</p>'.
//            //'<p>Date de création : '.$oUser->getCreateAt().'</p>'.
//            '<p class="address">Adresse</p>' .
//            '</hr>' .
//            '<p>Nom de la rue : ' . $oUser->getAddress()->getStreet() . '</p>' .
//            '<p>Ville : ' . $oUser->getAddress()->getCity() . '</p>' .
//            '<p>Code postal : ' . $oUser->getAddress()->getPostalCode() . '</p>' .
//            '<p>Pays : ' . $oUser->getAddress()->getCountry() . '</p></div>';
//    }

    ?>
</main>