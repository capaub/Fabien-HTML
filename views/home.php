<?php

    use Blog\Repository\ArticleRepository;

    $aArticles = ArticleRepository::findAll();
    $aRandArtc = array_rand($aArticles,3);
    $aRandom = [];
    foreach ($aRandArtc as $key){
        $aRandom[] = $aArticles[$key];
    }

?>

<main class="container">
    <h1 class="text-center text-white">Mon Blog</h1>


    <div class="row justify-content-center">
    <?php foreach ($aRandom as $oArticle) : ?>
        <article class="col-3 bg-light rounded-1 mx-3 p-4 container"  >
            <h4><?= $oArticle->getTitle() ?></h4>
            <ul class="align-content-around">
                <li class="col-12 list-unstyled">Catégorie : <?= $oArticle->getCategory()->getName() ?></li>
                <li class="col-6 list-unstyled">Status : <?= $oArticle->getStatus() ?></li>
                <li class="col-6 list-unstyled">Date de création : <?= $oArticle->getCreatedAt()->format('Y-m-d') ?></li>
            </ul>
            <p class="align-items-center px-5"><?= $oArticle->getContent() ?></p>
        </article>
    <?php endforeach;?>
    </div>
</main>